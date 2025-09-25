<?php

namespace App\Http\Controllers;

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
        return view('karyawan.admin-info');
    }

    public function dashboard()
    {
        return view('karyawan.dashboard');
    }

    public function project()
    {
        return view('karyawan.project');
    }

    public function createProject()
    {
        return view('karyawan.create-project');
    }
    public function editProject()
    {
        return view('karyawan.edit-project');
    }

    public function task()
    {
        return view('karyawan.task');
    }

    public function taskDetail()
    {
        return view('karyawan.task-detail');
    }

    public function activity()
    {
        return view('karyawan.activity');
    }

    public function administration()
    {
        return view('karyawan.administration');
    }

    public function profileAdmin()
    {
        return view('karyawan.profile-admin');
    }

    public function userAccount()
    {
        return view('karyawan.user-account');
    }

    public function userDetail()
    {
        return view('karyawan.user-detail');
    }
    public function submissionTable()
    {
        return view('karyawan.submission-table');
    }
}
