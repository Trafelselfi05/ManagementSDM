<?php

namespace App\Http\Controllers;

use App\Models\Leave;
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
    return view("karyawan.project");
  }

  public function createProject()
  {
    return view("karyawan.create-project");
  }
  public function editProject()
  {
    return view("karyawan.edit-project");
  }

  public function task()
  {
    return view("karyawan.task");
  }

  public function taskDetail()
  {
    return view("karyawan.task-detail");
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
    $leave = Leave::with('user')->findOrFail($id);

    return view('director.administration-status', compact('leave'));
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
