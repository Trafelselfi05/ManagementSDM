<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\Task;
use Illuminate\Http\Request;

class KaryawanController extends Controller
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

      if ($user->isDirector()) {
        return redirect()->route("director.dashboard");
      }

      return $next($request);
    });
  }
  public function adminInfo()
  {
    return view("karyawan.admin-info");
  }

  public function dashboard()
  {
    return view("karyawan.dashboard");
  }

  public function project()
  {
    $projects = Project::with("members")
      ->whereRelation("members", "user_id", auth()->user()->id)
      ->get();
    return view("karyawan.project", compact("projects"));
  }

  public function task()
  {
    $projects = Project::with("members")
      ->whereRelation("members", "user_id", auth()->user()->id)
      ->get();

    $tasks = Task::with(["project", "assignedUser"])
      ->where("assigned_to", auth()->user()->id)
      ->orWhere("created_by_user_id", auth()->user()->id) // ← tambahkan di sini
      ->get();

    $tasksByStatus = [
      "todo" => $tasks->where("status", "todo"),
      "in_progress" => $tasks->where("status", "in_progress"),
      "review" => $tasks->where("status", "review"),
      "completed" => $tasks->where("status", "completed"),
    ];

    $projectUsers = ProjectUser::with(["project", "user"])
      ->where("user_id", auth()->user()->id)
      ->get();

    return view(
      "karyawan.task",
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
      "created_by_user_id" => auth()->user()->id, // atau admin_id jika pakai admin guard
    ]);

    return back()->with("success", "Task created successfully!");
  }

  public function taskDetail()
  {
    $tasks = Task::with(["project", "assignedUser"])
      ->where("assigned_to", auth()->user()->id)
      ->orWhere("created_by_user_id", auth()->user()->id) // ← tambahkan di sini
      ->get();
      
    return view("karyawan.task-detail", compact("tasks"));
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
    return view("karyawan.activity");
  }

  public function administration()
  {
    return view("karyawan.administration");
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
      ->route("karyawan.administration-list")
      ->with("success", "Leave request submitted successfully.");
  }

  public function administrationList()
  {
    $leaves = Leave::with("user")
      ->where("user_id", auth()->user()->id)
      ->get();

    return view("karyawan.administration-list", compact("leaves"));
  }

  public function administrationStatus($id)
  {
    $leave = Leave::with("user")->findOrFail($id);

    return view("director.administration-status", compact("leave"));
  }

  public function profileAdmin()
  {
    return view("karyawan.profile-admin");
  }

  public function userAccount()
  {
    return view("karyawan.user-account");
  }

  public function userDetail()
  {
    return view("karyawan.user-detail");
  }
  public function submissionTable()
  {
    return view("karyawan.submission-table");
  }
}
