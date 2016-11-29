<?php

namespace App\Http\Controllers\Auth;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegistrationController extends Controller
{
    //
    public function registerUser(Request $request)
    {
        $user = Sentinel::registerAndActivate($request->all());
        dd($user);
    }
}
