<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Http;

class PartController extends Controller
{
    //
    function index(){
        $response = Http::withToken(session('token'), 'Token')->get("http://localhost:8000/api/part/.*", [
            "limit" => 25,
        ]);
        $parts = json_decode($response)->{"results"};
        foreach($parts as $part){
            $category_id = $part->{'category'};
            $category_json = Http::withToken(session('token'), 'Token')->get("http://localhost:8000/api/part/category/{$category_id}/.*");
            $category_name = json_decode($category_json)->{"name"};
            $part->{"category"} = $category_name;
        }
        return view("parts.part", compact("parts"));
    }

    function create(){
        return view("parts.part_create");
    }


    function read(Request $request){
        //Pull item from Inventree and show in item page
        $part_id = $request->id;
        $response = Http::withToken(session('token'), 'Token')->get("http://localhost:8000/api/part/$part_id/.*");
        $part = json_decode($response);
        return view("parts.part_details", compact("part"));
    }

    function edit(){
        //Pull item from Inventree and show in itemEdit page
        return view("parts.part_edit");
    }

    function delete(){
        //Delete logic here:


        //Return to the inventory view
        return redirect("parts.part");
    }
}
