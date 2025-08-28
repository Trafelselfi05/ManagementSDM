<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('user.login');
});

Route::get('admin/profile', function () {
    return view('admin.profile');
})->name('profile.show');

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