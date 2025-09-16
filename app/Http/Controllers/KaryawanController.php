<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaryawanController extends Controller
{
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
