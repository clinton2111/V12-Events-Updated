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

    private function arrayKeyModified($array)
    {
        $temp_array = array();
        foreach ($array as $result) {
            $temp_array[$result->key] = $result;
        }
        return $temp_array;
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
        $category = config('app.contact_category');
        $address = trim($request['building']) . ',<br>' . trim($request['street']) . ',<br>' . trim($request['city']) . ',<br>' . trim($request['country']);

        if (!$this->checkIfKeyExists($key)) {
            $config = new Config;
            $config->key = $key;
            $config->value = $address;
            $config->category = $category;
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
        $category = config('app.contact_category');
        $latlong = $request['lat'] . ',' . $request['long'];
        if (!$this->checkIfKeyExists($key)) {
            $config = new Config;
            $config->key = $key;
            $config->value = $latlong;
            $config->category = $category;
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
        $category = config('app.contact_category');
        $style = $request['style'];
        if (!$this->checkIfKeyExists($key)) {
            $config = new Config;
            $config->key = $key;
            $config->value = $style;
            $config->category = $category;
            $config->save();

            return response()->json(['message' => 'Style Updated', 'status' => 200], 200);
        } else {

            Config::where('key', $key)->update(['value' => $style]);
            return response()->json(['message' => 'Style Updated', 'status' => 200], 200);
        }
    }

    public function updateContactDetails(Request $request)
    {
        $keys = ['facebook', 'twitter', 'gplus', 'instagram', 'youtube', 'linkedin', 'vimeo', 'snapchat', 'email', 'phone', 'skype', 'whatsapp'];
        $category = null;
        if ($request->category == 'social') {
            $category = config('app.social_category');
        } elseif ($request->category == 'contact') {
            $category = config('app.contact_category');
        } else {
            abort(404);
        }
        $results = Config::where('category', $category)->get();
        $modified_results = $this->arrayKeyModified($results);
        foreach ($keys as $key) {
            $link = $request[$key];
            if ($link) {
                if (!$this->checkIfKeyExists($key)) {
                    $config = new Config;
                    $config->key = $key;
                    $config->value = $link;
                    $config->category = $category;
                    $config->save();
                } else {

                    if ($link != $modified_results[$key]->value) {
                        Config::where('key', $key)->update(['value' => $link]);
                    }
                }
            }
        }
        if ($category == 'social') {
            return response()->json(['message' => 'Social Links Updated', 'status' => 200], 200);
        } elseif ($category == 'contact') {
            return response()->json(['message' => 'Contact Details Updated', 'status' => 200], 200);
        } else {
            abort(404);
        }

    }

    public function deleteConfig(Request $request)
    {
        $key = $request->name;
//        dd($key);
        if($this->checkIfKeyExists($key)){
            $deleteState=Config::where('key', $key)->delete();
            if($deleteState){
                return response()->json(['message' => ucwords($key).' Deleted Successfully', 'status' => 200], 200);
            }else{
                return response()->json(['message' => ucwords($key).' Could Not Be Deleted', 'status' => 200], 200);
            }
        }else{
            return response()->json(['message' => 'Entry Does Not Exist', 'status' => 200], 200);
        }
    }
}
