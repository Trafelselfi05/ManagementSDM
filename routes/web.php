<?php

use Illuminate\Support\Facades\Route;

// Route untuk halaman login
Route::get('/', function () {
    return view('user.loginUser');
});

// Route untuk dashboard user
//Route::get('user/dashboard', function () {
//    return view('user.dashboardUser');
//})->name('dashboardUser');

// Route untuk profile user
Route::get('user/profile', function () {
    return view('user.profile');
})->name('profile.show');