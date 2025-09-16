<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminInfo()
    {
        return view('admin.admin-info');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function project()
    {
        return view('admin.project');
    }

    public function createProject()
    {
        return view('admin.create-project');
    }
    public function editProject()
    {
        return view('admin.edit-project');
    }

    public function task()
    {
        return view('admin.task');
    }

    public function taskDetail()
    {
        return view('admin.task-detail');
    }

    public function activity()
    {
        return view('admin.activity');
    }

    public function administration()
    {
        return view('admin.administration');
    }

    public function profileAdmin()
    {
        return view('admin.profile-admin');
    }

    public function userAccount()
    {
        return view('admin.user-account');
    }

    public function userDetail()
    {
        return view('admin.user-detail');
    }
    public function submissionTable()
    {
        return view('admin.submission-table');
    }
}
