<?php

namespace App\Http\Controllers\Admin;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    //
    public function updateAvatar(Request $request)
    {
        if ($request->hasFile('avatar')) {

            $path = '/uploads/avatars/';
            $avatar = $request->file('avatar');

            $user = Sentinel::getUser();
            $current_image = $user->avatar;
            if ($current_image != 'default.jpg') {
                File::delete(public_path($path . $current_image));
            }
            $filename = time() . md5($user->email) . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path($path . $filename));


            $user->avatar = $filename;
            $user->save();
            return view('admin.dashboard-account', array('user' => Sentinel::getUser()));
        }
    }

    public function updatePassword(Request $request)
    {
        $password = $request['new_password'];
        $user = Sentinel::getUser();
        $credentials = [
            'password' => $password
        ];
        if (Sentinel::update($user, $credentials)) {
            return response()->json(['message' => 'Password Updated', 'status' => 200], 200);
        } else {
            return response()->json(['message' => 'Password Updating Failed', 'status' => 422], 422);
        }
    }
}
