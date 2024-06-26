<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Throwable;

class LoginController extends Controller
{
    function index(){
        return view("login");
    }

    function logout(Request $request){ 
        $request->session()->put('token', null);        
        return view("login");
    }

    function login(Request $request) : RedirectResponse
    {
        $validated = $request->validate([
            'username' => 'required|max:20',
            'password' => 'required|max:20',
        ]);
        try{   
            $username = $validated['username'];
            $password = $validated['password'];
            // Try obtaining a token with given credentials
            $response = Http::withBasicAuth($username, $password)->get("http://inventree.localhost/api/user/token/");
            $obj = json_decode($response);
            // dd($obj);
            $token = $obj->{'token'};
            $request->session()->put('token', $token);
            return redirect()->route('dashboard');
        } catch (Throwable $e) {
            report($e);     
            return redirect("login");
        }

    }
}
