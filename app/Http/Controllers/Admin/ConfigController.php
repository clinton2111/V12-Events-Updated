<?php

namespace App\Http\Controllers\Admin;

use App\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    //
    private function checkIfKeyExists($key)
    {
        return Config::where('key', '=', $key)->exists() ? true : false;
    }

    public function updateAddress(Request $request)
    {
        $this->validate($request, [
            'building' => 'required',
            'street' => 'required',
            'city' => 'required',
            'country' => 'required'
        ]);
    }
}
