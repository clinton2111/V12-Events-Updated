<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('admin.dashboard-account');
    }

    public function update_avatar(Request $request)
    {
        if ($request->hasFile('avatar')) {

            $path = '/uploads/avatars/';
            $avatar = $request->file('avatar');


            $current_image = Auth::user()->avatar;
            if ($current_image != 'default.jpg') {
                File::delete(public_path($path . $current_image));
            }

            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path($path . $filename));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
            return view('admin.dashboard-account', array('user' => Auth::user()));
        }
    }

    public function update_password(Request $request)
    {
        $password = $request['new_password'];
        $user = Auth::user();
        $user->password = $password;
        if ($user->update()) {
            return response()->json(['message' => 'Password Updated', 'status' => 200], 200);
        } else {
            return response()->json(['message' => 'Password Updating Failed', 'status' => 422], 422);
        }
    }
}