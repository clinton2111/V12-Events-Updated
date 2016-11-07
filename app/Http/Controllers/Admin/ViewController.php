<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewController extends Controller
{
    //
    public function fetchDashboardPage()
    {
        return view('admin.dashboard');
    }

    public function fetchAccountSettingsPage()
    {
        return view('admin.dashboard-account');
    }

    public function fetchContactSettingsPage()
    {
        return view('admin.dashboard-contact');
    }
}
