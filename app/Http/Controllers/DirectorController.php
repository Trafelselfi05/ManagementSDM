<?php

namespace App\Http\Controllers;

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
    return view("director.dashboard");
  }

  public function project()
  {
    return view("director.project");
  }

  public function createProject()
  {
    return view("director.create-project");
  }
  public function editProject()
  {
    return view("director.edit-project");
  }

  public function task()
  {
    return view("director.task");
  }

  public function taskDetail()
  {
    return view("director.task-detail");
  }

  public function activity()
  {
    return view("director.activity");
  }

  public function administration()
  {
    return view("director.administration");
  }
  public function administrationStatus()
  {
    return view("director.administration-status");
  }
  public function administrationList()
  {
    return view("director.administration-list");
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
