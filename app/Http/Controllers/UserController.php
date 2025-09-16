<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboardDirector() {
        return view('director.dashboard-director');
    }
    public function directorInfo() {
        return view('director.director-info');
    }
    public function administrationDirector() {
        return view('director.administration-director');
    }
    public function projectDirector() {
        return view('director.project-director');
    }
    public function taskDirector() {
        return view('director.task-director');
    }
    public function taskDetailDirector() {
        return view('director.task-detail-director');
    }
    public function createProjectDirector() {
        return view('director.create-project-director');
    }
    public function profileDirector() {
        return view('director.profile-director');
    }
    
}
