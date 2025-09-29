<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
    return view("admin.project");
  }

  public function createProject()
  {
    $employees = User::where("email", "!=", "admin@gmail.com")->get();

    return view("admin.create-project", compact("employees"));
  }
  public function editProject()
  {
    return view("admin.edit-project");
  }

  public function task()
  {
    return view("admin.task");
  }

  public function taskDetail()
  {
    return view("admin.task-detail");
  }

  public function activity()
  {
    return view("admin.activity");
  }

  public function administration()
  {
    return view("admin.administration");
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
      "password" => bcrypt($request->password),
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
    return view("admin.user-detail", compact('user'));
}

  public function submissionTable()
  {
    return view("admin.submission-table");
  }
}
