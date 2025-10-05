<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
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

      if (!$user->isAdmin()) {
        return redirect()->route("director.dashboard");
      }

      if ($user->isKaryawan()) {
        return redirect()->route("karyawan.dashboard");
      }

      return $next($request);
    });
  }
  public function adminInfo()
  {
    return view("admin.admin-info");
  }

  public function dashboard()
  {
    return view("admin.dashboard");
  }

  public function project()
  {
    $projects = Project::with("director")->get();
    return view("admin.project", compact("projects"));
  }

  public function createProject()
  {
    $directors = User::where("email", "!=", "admin@gmail.com")
      ->where("role", "director")
      ->get();

    $karyawans = User::where("email", "!=", "admin@gmail.com")
      ->where("role", "karyawan")
      ->get()
      ->groupBy("division"); // 🔥 Grouping divisi

    return view("admin.create-project", compact("directors", "karyawans"));
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
      ->route("admin.project")
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
      "admin.edit-project",
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
      ->route("admin.project")
      ->with("success", "Project updated successfully.");
  }

  public function task()
  {
    $projects = Project::all();
    $tasks = Task::with(["project", "assignedUser"])->get();

    $tasksByStatus = [
      "todo" => $tasks->where("status", "todo"),
      "in_progress" => $tasks->where("status", "in_progress"),
      "review" => $tasks->where("status", "review"),
      "completed" => $tasks->where("status", "completed"),
    ];

    $projectUsers = ProjectUser::with("user")->get();

    return view(
      "admin.task",
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
      "updated_at" => now(),
    ]);

    return back()->with("success", "Task successfully updated!");
  }

  public function taskDetail()
  {
    $tasks = Task::with(["project", "assignedUser"])->get();

    return view("admin.task-detail", compact("tasks"));
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
    $task->save();

    // Jika request AJAX/JSON -> kembalikan JSON
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

    // fallback redirect
    return redirect()->back()->with("success", "Task updated successfully.");
  }

  public function activity()
  {
    return view("admin.activity");
  }

  public function administration()
  {
    $users = User::where("email", "!=", "admin@gmail.com")->get();

    return view("admin.administration", compact("users"));
  }

  public function storeLeave(Request $request)
  {
    // Validasi
    $validated = $request->validate([
      "user_id" => "required|exists:users,id",
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
      "user_id" => $validated["user_id"],
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
      ->route("admin.submission-table")
      ->with("success", "Leave request submitted successfully.");
  }

  public function storeApprove(Request $request, $id)
  {
    // \Log::info("Request Data:", $request->all());
    // dd($request->all());

    // Menerima $id dari route parameter
    // 1. Cari data cuti, gagal jika tidak ditemukan (findOrFail)
    $leave = Leave::findOrFail($id);

    // 2. Perbarui kolom 'verified' menjadi 2 (Approve)
    $leave->update([
      "verified" => 2,
      "verified_description" => $request->approveNotes,
    ]);

    // Opsional: Redirect ke halaman tabel cuti
    return redirect()
      ->route("admin.submission-table")
      ->with("success", "Permintaan cuti berhasil **disetujui** (Approved).");
  }

  public function storeReject(Request $request, $id)
  {
    // \Log::info("Request Data:", $request->all());
    // dd($request->all());

    // Menerima $id dari route parameter
    // 1. Cari data cuti, gagal jika tidak ditemukan (findOrFail)
    $leave = Leave::findOrFail($id);

    // 2. Perbarui kolom 'verified' menjadi 2 (Approve)
    $leave->update([
      "verified" => 1,
      "verified_description" => $request->approveNotes,
    ]);

    // Opsional: Redirect ke halaman tabel cuti
    return redirect()
      ->route("admin.submission-table")
      ->with("success", "Permintaan cuti berhasil **disetujui** (Approved).");
  }

  public function profileAdmin()
  {
    return view("admin.profile-admin");
  }

  public function profileAdminStore(Request $request)
  {
    try {
      $request->validate([
        "name" => "required|string|max:255",
        "email" => "required|email|unique:users,email",
        "password" => "required|string|min:6",
        "division" => "nullable|string",
        "nik" => "nullable|string",
        "phone" => "nullable|string",
        "telegram_link" => "nullable|string",
        "employment_status" => "nullable|string",
        "birth_date" => "nullable|date",
        "join_date" => "nullable|date",
        "last_education" => "nullable|string",
        "role" => "nullable|string",
        "address" => "nullable|string",
        "image" => "nullable|image|mimes:jpg,jpeg,png|max:2048",
      ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
      return back()->withErrors($e->errors())->withInput();
    }

    // Upload image
    $imagePath = null;
    if ($request->hasFile("image")) {
      $imagePath = $request->file("image")->store("users", "public");
      $imagePath = "storage/" . $imagePath;
    }

    // Buat user
    User::create([
      "name" => $request->name,
      "email" => $request->email,
      "password" => Hash::make($request->password),
      "division" => $request->division,
      "nik" => $request->nik,
      "phone" => $request->phone,
      "telegram_link" => $request->telegram_link,
      "employment_status" => $request->employment_status,
      "birth_date" => $request->birth_date,
      "join_date" => $request->join_date,
      "last_education" => $request->last_education,
      "role" => $request->role,
      "address" => $request->address,
      "image" => $imagePath,
      "dashboard_status" => "ready",
    ]);

    return redirect()
      ->route("admin.user-account")
      ->with("success", "User berhasil dibuat!");
  }

  public function userAccount()
  {
    // Ambil semua user kecuali admin@gmail.com
    $users = User::where("email", "!=", "admin@gmail.com")->get();

    return view("admin.user-account", compact("users"));
  }

  public function userDetail($id)
  {
    $user = User::findOrFail($id);
    return view("admin.user-detail", compact("user"));
  }

  public function updateUserDetail(Request $request, $id)
  {
    $user = User::findOrFail($id);

    // \Log::info("Request Data:", $request->all());
    // dd($request->all());

    $request->validate([
      "name" => "required|string|max:255",
      "division" => "nullable|string",
      "email" => "required|email",
      "nik" => "nullable|string",
      "employment_status" => "nullable|string",
      "phone" => "nullable|string",
      "join_date" => "nullable|date",
      "birth_date" => "nullable|date",
      "telegram_link" => "nullable|string",
      "address" => "nullable|string",
      "last_education" => "nullable|string",
      "password" => "nullable|min:6",
      "image" => "nullable|image|mimes:jpg,jpeg,png|max:2048",
    ]);

    // Update basic data
    $user->name = $request->name;
    $user->division = $request->division;
    $user->email = $request->email;
    $user->nik = $request->nik;
    $user->employment_status = $request->employment_status;
    $user->phone = $request->phone;
    $user->join_date = $request->join_date;
    $user->birth_date = $request->birth_date;
    $user->telegram_link = $request->telegram_link;
    $user->address = $request->address;
    $user->last_education = $request->last_education;

    // Update password jika diisi
    if ($request->password) {
      $user->password = Hash::make($request->password);
    }

    // Upload gambar jika ada
    if ($request->hasFile("image")) {
      $file = $request->file("image");
      $path = $file->store("uploads/users", "public");
      $user->image = "/storage/" . $path;
    }

    $user->save();

    return redirect()
      ->route("admin.user-account", $id)
      ->with("success", "Data berhasil diperbarui!");
  }

  public function deleteUser($id)
  {
    $user = User::find($id);

    if (!$user) {
      return redirect()
        ->route("user-account")
        ->with("error", "User tidak ditemukan!");
    }

    // Jika ingin sekalian hapus gambar dari storage:
    if ($user->image && file_exists(public_path($user->image))) {
      unlink(public_path($user->image));
    }

    $user->delete();

    return redirect()
      ->route("admin.user-account")
      ->with("success", "User berhasil dihapus!");
  }

  public function submissionTable()
  {
    $leaves = Leave::with("user")->get();

    return view("admin.submission-table", compact("leaves"));
  }
}
