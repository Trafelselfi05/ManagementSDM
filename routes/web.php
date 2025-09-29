<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\KaryawanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function () {
  Route::get("/login", "showLoginForm")->name("login");
  Route::post("/login", "login")->name("auth-login");
  Route::get("/logout", "logout")->name("logout");
});

// A single route for the homepage can be defined separately
Route::get("/", function () {
  return redirect()->route("login");
});

// Admin Routes
Route::controller(AdminController::class)
  ->prefix("admin")
  ->name("admin.")
  ->group(function () {
    Route::get("admin-info", "adminInfo")->name("admin-info");
    Route::get("dashboard", "dashboard")->name("dashboard");
    Route::get("project", "project")->name("project");
    Route::get("create-project", "createProject")->name("project.create");
    Route::get("task", "task")->name("task");
    Route::get("task-detail", "taskDetail")->name("task-detail");
    Route::get("activity", "activity")->name("activity");
    Route::get("administration", "administration")->name("administration");

    // web.php
    Route::get("profile-admin", "profileAdmin")->name("profile-admin"); // sudah ada, jangan diubah
    Route::post("profile-admin", "profileAdminStore")->name(
      "profile-admin.store"
    );

    Route::get("user-account", "userAccount")->name("user-account");
    Route::get("user-detail/{id}", "userDetail")->name("user-detail");
    Route::get("submission-table", "submissionTable")->name("submission-table");
    Route::get("edit-project", "editProject")->name("edit-project");
  });

// Director Routes
Route::controller(DirectorController::class)
  ->prefix("director")
  ->name("director.")
  ->group(function () {
    Route::get("admin-info", "adminInfo")->name("admin-info");
    Route::get("dashboard", "dashboard")->name("dashboard");
    Route::get("project", "project")->name("project");
    Route::get("create-project", "createProject")->name("project.create");
    Route::get("task", "task")->name("task");
    Route::get("task-detail", "taskDetail")->name("task-detail");
    Route::get("activity", "activity")->name("activity");
    Route::get("administration-status", "administrationStatus")->name(
      "administration-status"
    );
    Route::get("administration", "administration")->name("administration");
    Route::get("administration-list", "administrationList")->name(
      "administration-list"
    );
    Route::get("profile-admin", "profileAdmin")->name("profile-admin");
    Route::get("user-account", "userAccount")->name("user-account");
    Route::get("user-detail", "userDetail")->name("user-detail");
    Route::get("submission-table", "submissionTable")->name("submission-table");
    Route::get("edit-project", "editProject")->name("edit-project");
  });

// Karyawan (Employee) Routes
Route::controller(KaryawanController::class)
  ->prefix("karyawan")
  ->name("karyawan.")
  ->group(function () {
    Route::get("admin-info", "adminInfo")->name("admin-info");
    Route::get("dashboard", "dashboard")->name("dashboard");
    Route::get("project", "project")->name("project");
    Route::get("create-project", "createProject")->name("project.create");
    Route::get("task", "task")->name("task");
    Route::get("task-detail", "taskDetail")->name("task-detail");
    Route::get("activity", "activity")->name("activity");
    Route::get("administration", "administration")->name("administration");
    Route::get("administration-list", "administrationList")->name(
      "administration-list"
    );
    Route::get("administration-status", "administrationStatus")->name(
      "administration-status"
    );
    Route::get("profile-admin", "profileAdmin")->name("profile-admin");
    Route::get("user-account", "userAccount")->name("user-account");
    Route::get("user-detail", "userDetail")->name("user-detail");
    Route::get("submission-table", "submissionTable")->name("submission-table");
    Route::get("edit-project", "editProject")->name("edit-project");
  });
