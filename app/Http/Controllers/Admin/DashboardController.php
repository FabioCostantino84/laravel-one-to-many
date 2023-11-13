<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;

class DashboardController extends Controller
{


    public function index()
    {

        $total_projects = Project::all()->count();
        $total_users = User::all()->count();

        return view('admin.dashboard', compact('total_projects', 'total_users'));
    }
}