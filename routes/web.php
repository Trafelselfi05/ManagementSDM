<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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

// Root Route
Route::get('/', function () {
    return view('Auth.login');
});

// Admin Routes grouped by Controller
Route::controller(AdminController::class)->prefix('admin')->group(function () {
    Route::get('admin-info', 'adminInfo')->name('admin-info');
    Route::get('dashboard', 'dashboard')->name('dashboard');
    Route::get('project', 'project')->name('project');
    Route::get('create-project', 'createProject')->name('project.create');
    Route::get('task', 'task')->name('task');
    Route::get('task-detail', 'taskDetail')->name('task-detail');
    Route::get('activity', 'activity')->name('activity');
    Route::get('administration', 'administration')->name('administration');
    Route::get('profile-admin', 'profileAdmin')->name('profile-admin');
    Route::get('user-account', 'userAccount')->name('user-account');
    Route::get('user-detail', 'userDetail')->name('user-detail');
    Route::get('submission-table', 'submissionTable')->name('submission-table');
    Route::get('edit-project', 'editProject')->name('edit-project');
});

// User Routes grouped by Controller
Route::controller(UserController::class)->prefix('director')->group(function () {
    Route::get('dashboard', 'dashboardDirector')->name('dashboard-director');
    Route::get('director-info', 'directorInfo')->name('director-info');
    Route::get('administration', 'administrationDirector')->name('administration-director');
    Route::get('project', 'projectDirector')->name('project-director');
    Route::get('task', 'taskDirector')->name('task-director');
    Route::get('task-detail', 'taskDetailDirector')->name('task-detail-director');
    Route::get('create-project', 'createProjectDirector')->name('creat-project-director');
    Route::get('profile-director', 'profileDirector')->name('profile-director');

});
