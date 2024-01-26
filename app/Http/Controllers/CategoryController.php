<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Throwable;

class CategoryController extends Controller
{
    //
    public function index(){
        $response = Http::withToken(session('token'), 'Token')->get("http://localhost:8000/api/part/category/");
        $categories = json_decode($response);
        return view("categories.category" ,compact("categories"));
    }

    public function create(){
        return view("categories.category_create");
    }

    public function category_create(Request $request){
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'nullable|max:250',
        ]);
        try{
            // Try obtaining a token with given credentials
            $response = Http::withToken(session('token'), 'Token')->post("http://localhost:8000/api/part/category/", [
                'name' => $request->name,
                'description' => $request->description,
                'parent' => null,
            ]);
            dd($response);
            report($response);
            return redirect("/part?page=1");
        } catch (Throwable $e) {
            report($e);     
            return redirect("/dashboard");
        }
    }
}
