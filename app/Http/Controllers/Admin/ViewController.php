<?php

namespace App\Http\Controllers\Admin;

use App\Config;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewController extends Controller
{
    //
    public function fetchRegisterPage()
    {
        return view('auth.register');
    }

    public function fetchLoginPage()
    {
        if (Sentinel::check() == TRUE) {
            return redirect()->route('dashboard.home');
        } else {
            return view('auth.login');
        }

    }

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
        $data = array();
        $matchThese = ['company_address', 'company_geolocation', 'company_map_style'];

        foreach ($matchThese as $match) {
            $result = Config::where('key', $match)->first();
            if ($result) {
                $data[$match] = $result['value'];
            } else {
                $data[$match] = null;
            }
        }


        $addressSections = ['building', 'street', 'city', 'country'];
        $addressArray = null;
        if ($data['company_address'] != null) {
            $addressArray = explode(",<br>", $data['company_address']);
        } else {
            $addressArray = ['', '', '', ''];
        }

        $index = 0;
        foreach ($addressArray as $part) {
            $data[$addressSections[$index]] = strip_tags($part);
            $index++;
        }
        unset($data['company_address']);
        if ($data['company_geolocation'] != null) {
            $geoArray = explode(',', $data['company_geolocation']);
            $data['lat'] = floatval($geoArray[0]);
            $data['lng'] = floatval($geoArray[1]);
            unset($data['company_geolocation']);
        }else{
            $data['lat'] = null;
            $data['lng'] = null;
        }
        return view('admin.dashboard-contact')->with('data', $data);
    }
}
