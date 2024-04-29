<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Throwable;

class LocationController extends Controller
{
    //
    public function index(){
        $response = Http::withToken(session('token'), 'Token')->get("http://inventree.localhost/api/stock/location/.*");
        $locations = json_decode($response);
        return view("locations.location" ,compact("locations"));
    }

    public function create(){
        return view("locations.location_create");
    }

    public function location_create(Request $request){
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'nullable|max:250',
        ]);
        try{
            // Try obtaining a token with given credentials
            $response = Http::withToken(session('token'), 'Token')->post("http://inventree.localhost/api/stock/location/.*", [
                'name' => $request->name,
                'description' => $request->description,
            ]);
            report($response);
            return redirect("/location");
        } catch (Throwable $e) {
            report($e);     
            return redirect("/dashboard");
        }
    }
}
