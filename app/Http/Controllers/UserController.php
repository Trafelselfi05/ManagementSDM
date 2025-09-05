<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboardUser() {
        return view('user.dashboard-user');
    }

    public function userInfo() {
        return view('user.user-info');
    }

    public function administrationUser() {
        return view('user.administration-user');
    }

    public function taskUser() {
        return view('user.task-user');
    }

    public function taskDetailUser() {
        return view('user.task-detail-user');
    }

    public function projectUser() {
        return view('user.project-user');
    }

    public function createProjectUser() {
        return view('user.create-project-user');
    }
}
