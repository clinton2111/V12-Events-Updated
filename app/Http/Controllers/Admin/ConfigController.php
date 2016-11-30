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
        $config = Config::where('key', $key)->first();
        if (is_null($config)) {
            return false;
        } else {
            return true;
        }
    }

    public function updateAddress(Request $request)
    {
        $this->validate($request, [
            'building' => 'required',
            'street' => 'required',
            'city' => 'required',
            'country' => 'required'
        ]);
        $key = 'company_address';
        $address = trim($request['building']) . ',<br>' . trim($request['street']) . ',<br>' . trim($request['city']) . ',<br>' . trim($request['country']);

        if (!$this->checkIfKeyExists($key)) {
            $config = new Config;
            $config->key = $key;
            $config->value = $address;
            $config->category = config('app.contact_category');
            $config->save();

            return response()->json(['message' => 'Address Updated', 'status' => 200], 200);
        } else {

            Config::where('key', $key)->update(['value' => $address]);
            return response()->json(['message' => 'Address Updated', 'status' => 200], 200);
        }
    }

    public function updateAddressMap(Request $request)
    {
        $this->validate($request, [
            'lat' => 'required',
            'long' => 'required',
        ]);

        $key = 'company_geolocation';
        $latlong = $request['lat'] . ',' . $request['long'];
        if (!$this->checkIfKeyExists($key)) {
            $config = new Config;
            $config->key = $key;
            $config->value = $latlong;
            $config->category = config('app.contact_category');
            $config->save();

            return response()->json(['message' => 'Location Updated', 'status' => 200], 200);
        } else {

            Config::where('key', $key)->update(['value' => $latlong]);
            return response()->json(['message' => 'Location Updated', 'status' => 200], 200);
        }
    }

    public function updateAddressMapStyle(Request $request)
    {
        $this->validate($request, [
            'style' => 'required'
        ]);

        $key = 'company_map_style';
        $style = $request['style'];
        if (!$this->checkIfKeyExists($key)) {
            $config = new Config;
            $config->key = $key;
            $config->value = $style;
            $config->category = config('app.contact_category');
            $config->save();

            return response()->json(['message' => 'Style Updated', 'status' => 200], 200);
        } else {

            Config::where('key', $key)->update(['value' => $style]);
            return response()->json(['message' => 'Style Updated', 'status' => 200], 200);
        }
    }
}
