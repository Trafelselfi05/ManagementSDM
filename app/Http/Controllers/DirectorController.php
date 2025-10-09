<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Leave;
use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
  public function __construct()
  {
    $this->middleware(function ($request, $next) {
      $user = auth()->user();

      // Check if user is authenticated
      if (!$user) {
        auth()->logout();
        return redirect()
          ->route("login")
          ->with("error", "Sesi telah berakhir, silakan login kembali");
      }

      // Check if user record still exists in database
      try {
        if (!$user->exists) {
          auth()->logout();
          return redirect()
            ->route("login")
            ->with("error", "Akun tidak ditemukan");
        }
      } catch (\Exception $e) {
        auth()->logout();
        return redirect()
          ->route("login")
          ->with("error", "Terjadi kesalahan, silakan login kembali");
      }

      // --- Redirection based on user role ---
      if ($user->isAdmin()) {
        return redirect()->route("admin.dashboard");
      }

      if ($user->isKaryawan()) {
        return redirect()->route("karyawan.dashboard");
      }
      return $next($request);
    });
  }

  public function adminInfo()
  {
    return view("director.admin-info");
  }

  public function dashboard()
  {
    $today = Carbon::today()->toDateString();

    // Ambil user yang karyawan (atau semua jika ingin semua role)
    $directorId = auth()->user()->id;

    $users = User::whereHas("projects", function ($query) use ($directorId) {
      $query->where("director_id", $directorId);
    })
      ->where("role", "karyawan")
      ->distinct()
      ->get();

    $usersData = $users->map(function ($user) use ($today) {
      // apakah ada activity hari ini?
      $hasActivityToday = Activity::where("user_id", $user->id)
        ->whereDate("created_at", $today)
        ->exists();

      if ($hasActivityToday) {
        $task_status = "ready";
      }

      $isOnLeaveToday = Leave::where("user_id", $user->id)
        ->whereDate("start_date", "<=", $today)
        ->whereDate("end_date", ">=", $today)
        ->exists();

      // apakah ada task hari ini (interaksi hari ini)?
      $taskQueryBase = Task::where("assigned_to", $user->id)->where(function (
        $q
      ) use ($today) {
        $q->whereDate("created_at", $today)
          ->orWhereDate("updated_at", $today)
          ->orWhereDate("transfer_at", $today)
          ->orWhereDate("completed_at", $today);
      });

      $hasInProgress = (clone $taskQueryBase)
        ->where("status", "in_progress")
        ->exists();
      $hasReview = (clone $taskQueryBase)->where("status", "review")->exists();
      $hasCompleted = (clone $taskQueryBase)
        ->where("status", "completed")
        ->exists();
      $hasAnyTask = (clone $taskQueryBase)->exists();

      // tentukan dashboard_status (internal enum)
      if ($isOnLeaveToday) {
        $dashboard_status = "absent";
      } elseif ($hasInProgress) {
        $dashboard_status = "not_ready";
      } elseif ($hasReview) {
        $dashboard_status = "ready";
      } elseif ($hasCompleted) {
        $dashboard_status = "complete";
      } elseif (!$hasAnyTask) {
        $dashboard_status = "stand_by";
      } else {
        // fallback
        $dashboard_status = $user->dashboard_status ?? "stand_by";
      }

      // ambil task paling relevan untuk ditampilkan di card (jika ada)
      $latestTask = Task::where("assigned_to", $user->id)
        ->where(function ($q) use ($today) {
          $q->whereDate("created_at", $today)
            ->orWhereDate("updated_at", $today)
            ->orWhereDate("transfer_at", $today)
            ->orWhereDate("completed_at", $today);
        })
        ->orderByDesc("updated_at")
        ->with("project")
        ->first();

      // mapping untuk frontend data-status (karena di HTML kamu memakai standby / notready)
      $frontendStatus = $this->mapToFrontendStatus($dashboard_status);

      return [
        "id" => $user->id,
        "name" => $user->name,
        "division" => $user->division,
        "image" =>
          $user->image ??
          "https://c.animaapp.com/metnxwl0qnRrKd/img/image-60.png",
        "dashboard_status" => $dashboard_status, // internal enum
        "task_status" => $task_status ?? null, // internal enum
        "frontend_status" => $frontendStatus, // untuk atribut data-status pada card
        "task" => $latestTask
          ? [
            "id" => $latestTask->id,
            "name" => $latestTask->name,
            "level" => $latestTask->level,
            "status" => $latestTask->status,
            "project_name" => $latestTask->project->name ?? null,
          ]
          : null,
      ];
    });

    // dd($usersData);

    return view("director.dashboard", [
      "users" => $usersData,
    ]);
  }

  private function mapToFrontendStatus(string $internal): string
  {
    return match ($internal) {
      "stand_by" => "standby",
      "not_ready" => "notready",
      default => $internal, // ready, complete, absent remain same
    };
  }

  public function project()
  {
    $projects = Project::with("director")
      ->where("director_id", auth()->user()->id)
      ->get();
    return view("director.project", compact("projects"));
  }

  public function createProject()
  {
    $karyawans = User::where("email", "!=", "admin@gmail.com")
      ->where("role", "karyawan")
      ->get()
      ->groupBy("division"); // 🔥 Grouping divisi

    return view("director.create-project", compact("karyawans"));
  }

  public function storeProject(Request $request)
  {
    // \Log::info("Request Data:", $request->all());
    // dd($request->all());
    // 1️⃣ Validasi
    $request->validate([
      "name" => "required|string|max:255",
      "start_date" => "required|date",
      "deadline" => "required|date",
      "level" => "required|string",
      "description" => "nullable|string",
      "project_director" => "required|exists:users,id",
      "karyawan_id" => "required|string", // format: "7,8,10"
    ]);

    // 1️⃣ Simpan ke tabel projects
    $project = Project::create([
      "name" => $request->name,
      "start_date" => $request->start_date,
      "deadline" => $request->deadline,
      "director_id" => $request->project_director,
      "level" => $request->level,
      "status" => "ongoing", // Bisa diganti default status lain
      "description" => $request->description,
    ]);

    // 2️⃣ Masukkan anggota ke tabel project_user
    $karyawanIds = explode(",", $request->karyawan_id); // Convert string -> array [7,8,10]

    foreach ($karyawanIds as $userId) {
      ProjectUser::create([
        "project_id" => $project->id,
        "user_id" => $userId,
        "assigned_at" => now(),
      ]);
    }

    // 4️⃣ Redirect atau response
    return redirect()
      ->route("director.project")
      ->with("success", "Leave request submitted successfully.");
  }

  public function editProject($id)
  {
    // Ambil project (dengan director + anggota tim)
    $project = Project::with(["director", "members"])->findOrFail($id);

    // Ambil semua director (misalnya user dengan role project manager)
    $directors = User::where("role", "director")->get();

    // Ambil semua karyawan dan **group by division** (biar sama kayak create page)
    $karyawans = User::where("role", "karyawan")->get()->groupBy("division");

    // Ambil ID anggota project saat ini
    $selectedMembers = $project->members->pluck("id")->toArray();

    return view(
      "director.edit-project",
      compact("project", "directors", "karyawans", "selectedMembers")
    );
  }

  public function updateProject(Request $request, $id)
  {
    // 1️⃣ Validasi Input
    $request->validate([
      "name" => "required|string|max:255",
      "start_date" => "required|date",
      "deadline" => "required|date",
      "level" => "required|string",
      "description" => "nullable|string",
      "project_director" => "required|exists:users,id",
      "karyawan_id" => "required|string", // format: "7,8,10"
    ]);

    // 2️⃣ Cari Project
    $project = Project::findOrFail($id);

    // 3️⃣ Update Data Project
    $project->update([
      "name" => $request->name,
      "start_date" => $request->start_date,
      "deadline" => $request->deadline,
      "director_id" => $request->project_director,
      "level" => $request->level,
      "description" => $request->description,
    ]);

    // 4️⃣ Hapus Semua User Lama di ProjectUser
    ProjectUser::where("project_id", $project->id)->delete();

    // 5️⃣ Masukkan User Baru
    $karyawanIds = explode(",", $request->karyawan_id);
    foreach ($karyawanIds as $userId) {
      ProjectUser::create([
        "project_id" => $project->id,
        "user_id" => $userId,
        "assigned_at" => now(),
      ]);
    }

    // 6️⃣ Redirect
    return redirect()
      ->route("director.project")
      ->with("success", "Project updated successfully.");
  }

  public function task()
  {
    $projects = Project::where("director_id", auth()->user()->id)->get();

    $tasks = Task::with(["project", "assignedUser"])
      // Sintaks yang lebih ringkas (Laravel 9+)
      ->whereRelation("project", "director_id", auth()->user()->id)
      ->get();

    $tasksByStatus = [
      "todo" => $tasks->where("status", "todo"),
      "in_progress" => $tasks->where("status", "in_progress"),
      "review" => $tasks->where("status", "review"),
      "completed" => $tasks->where("status", "completed"),
    ];

    $projectUsers = ProjectUser::with(["project", "user"])
      ->whereRelation("project", "director_id", auth()->user()->id)
      ->get();

    return view(
      "director.task",
      compact("projects", "tasksByStatus", "projectUsers", "tasks")
    );
  }

  public function storeTask(Request $request)
  {
    // \Log::info("Request Data:", $request->all());
    // dd($request->all());

    $request->validate([
      "taskName" => "required|string|max:200",
      "project" => "required|exists:projects,id",
      "taskLevel" => "required|in:low,medium,high",
    ]);

    // Tentukan estimasi jam otomatis jika ingin:
    $estimated = match ($request->taskLevel) {
      "low" => 2,
      "medium" => 6,
      "high" => 8,
      default => 0,
    };

    Task::create([
      "project_id" => $request->project,
      "name" => $request->taskName,
      "level" => $request->taskLevel,
      "estimated_hours" => $estimated,
      "status" => "todo",
      "created_by_user_id" => auth()->id(), // atau admin_id jika pakai admin guard
    ]);

    return back()->with("success", "Task created successfully!");
  }

  public function transferTask(Request $request)
  {
    // \Log::info("Request Data:", $request->all());
    // dd($request->all());
    $request->validate([
      "project_id" => "required|exists:projects,id",
      "task_id" => "required|exists:tasks,id",
      "assigned_to" => "required|exists:users,id",
      "taskLevel" => "required|in:low,medium,high",
    ]);

    $task = Task::findOrFail($request->task_id);

    $task->update([
      "project_id" => $request->project_id,
      "assigned_to" => $request->assigned_to,
      "level" => $request->taskLevel,
      "status" => "in_progress",
      "transfer_at" => now(),
    ]);

    return back()->with("success", "Task successfully updated!");
  }

  public function taskDetail()
  {
    $tasks = Task::with(["project", "assignedUser"])
      ->where("director_id", auth()->user()->id)
      ->get();

    return view("director.task-detail", compact("tasks"));
  }

  public function updateTask(Request $request)
  {
    // Validasi
    $data = $request->validate([
      "task_id" => "required|exists:tasks,id",
      "name" => "nullable|string|max:200",
      "taskLevel" => "required|in:low,medium,high",
      "status" => "required|in:todo,in_progress,review,completed",
    ]);

    $task = Task::findOrFail($data["task_id"]);

    $task->name = $data["name"] ?? $task->name;
    $task->level = $data["taskLevel"];
    $task->status = $data["status"];
    $task->updated_at = now();

    // Jika status completed, isi waktu selesai & hitung jam kerja
    if ($data["status"] === "completed") {
      $task->completed_at = now();

      // Pastikan transfer_at sudah ada
      if ($task->transfer_at) {
        $transferAt = Carbon::parse($task->transfer_at);
        $completedAt = Carbon::parse($task->completed_at);

        // Hitung selisih dalam jam (misal: 3.5 jam)
        $workHours = round($transferAt->diffInMinutes($completedAt) / 60, 2);

        // dd($workHours);

        // Simpan ke tabel activities
        Activity::updateOrCreate(
          [
            "user_id" => $task->assigned_to,
            // agar 1 user 1 record per hari
            "created_at" => Carbon::today(),
          ],
          [
            // tambahkan jam kerja jika sudah ada
            "work_hours" => $workHours,
            "updated_at" => now(),
          ]
        );
      }
    }

    $task->save();

    // Jika request JSON
    if (
      $request->wantsJson() ||
      $request->ajax() ||
      $request->header("Accept") === "application/json"
    ) {
      return response()->json([
        "success" => true,
        "message" => "Task updated",
        "task" => $task,
      ]);
    }

    // Redirect biasa
    return redirect()->back()->with("success", "Task updated successfully.");
  }

  public function activity()
  {
    return view("director.activity");
  }

  public function administration()
  {
    return view("director.administration");
  }

  public function storeLeave(Request $request)
  {
    // \Log::info("Request Data:", $request->all());
    // dd($request->all());

    // Validasi
    $validated = $request->validate([
      "leave_category" => "required|string",
      "start_date" => "required|date",
      "end_date" => "required|date|after_or_equal:start_date",
      "description" => "nullable|string",
      "bring_laptop" => "required|boolean",
      "can_be_contacted" => "required|boolean",
      "supporting_document" => "nullable|image|mimes:jpg,jpeg,png|max:2048",
    ]);

    // Handle upload file jika ada
    $proofPath = null;
    if ($request->hasFile("supporting_document")) {
      $proofPath = $request
        ->file("supporting_document")
        ->store("proofs", "public");
    }

    // Simpan ke database
    $leave = Leave::create([
      "user_id" => auth()->user()->id,
      "type" => $validated["leave_category"], // enum di DB
      "start_date" => $validated["start_date"],
      "end_date" => $validated["end_date"],
      "description" => $validated["description"] ?? null,
      "bring_laptop" => (int) $validated["bring_laptop"], // pastikan int
      "contactable" => (int) $validated["can_be_contacted"],
      "proof_photo" => "/storage/" . $proofPath,
      "verified" => 0, // default
    ]);

    return redirect()
      ->route("director.administration-list")
      ->with("success", "Leave request submitted successfully.");
  }

  public function administrationStatus($id)
  {
    $leave = Leave::with("user")->findOrFail($id);

    return view("director.administration-status", compact("leave"));
  }

  public function administrationList()
  {
    $leaves = Leave::with("user")
      ->where("user_id", auth()->user()->id)
      ->get();
    return view("director.administration-list", compact("leaves"));
  }

  public function profileAdmin()
  {
    return view("director.profile-admin");
  }

  public function userAccount()
  {
    return view("director.user-account");
  }

  public function userDetail()
  {
    return view("director.user-detail");
  }
  public function submissionTable()
  {
    return view("director.submission-table");
  }
}
