<?php

namespace App\Http\Controllers\Auth;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //
    public function loginUser(Request $request)
    {
        If (Sentinel::authenticate($request->all())) {
            return redirect()->route('dashboard.home');
        }

    }

    public function logoutUser()
    {
        Sentinel::logout();
        return redirect()->route('login.user');
    }
}
