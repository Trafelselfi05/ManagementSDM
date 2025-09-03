<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('Auth.login');
});

Route::get('admin/admin-info', function () {
    return view('admin.admin-info');
})->name('admin-info');

Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::get('admin/project', function () {
    return view('admin.project');
})->name('project');

Route::get('admin/create-project', function () {
    return view('admin.create-project');
})->name('project.create');

Route::get('admin/task', function () {
    return view('admin.task');
})->name('task');

Route::get('admin/task-detail', function () {
    return view('admin.task-detail');
})->name('task-detail');

Route::get('admin/activity', function () {
    return view('admin.activity');
})->name('activity');

Route::get('admin/administration', function () {
    return view('admin.administration');
})->name('administration');

Route::get('admin/profile-admin', function () {
    return view('admin.profile-admin');
})->name('profile-admin');

Route::get('admin/user-account', function () {
    return view('admin.user-account');
})->name('user-account');

Route::get('admin/user-detail', function () {
    return view('admin.user-detail');
})->name('user-detail');

Route::get('user/dashboard-user', function () {
    return view('user.dashboard-user');
})->name('dashboard-user');

Route::get('user/user-info', function () {
    return view('user.user-info');
})->name('user-info');

Route::get('user/administration-user', function () {
    return view('user.administration-user');
})->name('administration-user');

Route::get('user/task-user', function () {
    return view('user.task-user');
})->name('task-user');

Route::get('user/task-detail-user', function () {
    return view('task-detail-user');
})->name('task-detail-user');

Route::get('user/project-user', function () {
    return view('user.project-user');
})->name('project-user');

Route::get('user/create-project-user', function () {
    return view('user.create-project-user');
})->name('create-project-user');

