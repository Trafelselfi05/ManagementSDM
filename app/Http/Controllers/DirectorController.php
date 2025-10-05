<?php

namespace App\Http\Controllers;

use App\Models\Leave;
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
    $leave = Leave::with('user')->findOrFail($id);

    return view('director.administration-status', compact('leave'));
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
