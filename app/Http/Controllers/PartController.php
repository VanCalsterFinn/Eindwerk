<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Http;

class PartController extends Controller
{
    //
    public function index(Request $request)
    {
        //check if the page query string has been set
        if (isset($request->page)) {
            $filter = $request->filter;
            $order = $request->order;
            $ordering_filter = ($order=="desc"?"-":"+")."$filter";
            $input = $request->input;
            $page = $request->page;
            //Catch page counts that go before the first showable page
            if ($page < 1) {
                route('part.view', ['page' => '1']);
            }
            //Grabbing a slice of data from Inventree
            $response = Http::withToken(session('token'), 'Token')->get("http://localhost:8000/api/part/.*", [
                "ordering" => "$ordering_filter",
                "search" => "$input",
                "limit" => 25,
                "offset" => ($page - 1) * 25,
            ]);
            $parts = json_decode($response)->{"results"};
            //Catch page counts that go past last showable page
            if ($parts == null) {
                route('part.view', ['page' => '1']);
            }
            //Interchanging the category primary key for the category name
            foreach ($parts as $part) {
                $category_id = $part->{'category'};
                $category_json = Http::withToken(session('token'), 'Token')->get("http://localhost:8000/api/part/category/{$category_id}/.*");
                $category_name = json_decode($category_json)->{"name"};
                $part->{"category"} = $category_name;
            }
            return view("parts.part", compact("parts", "page", "filter", "order"));
        }
        route('part.view', ['page' => '1']);
    }

    function create()
    {
        return view("parts.part_create");
    }


    function read(Request $request)
    {
        //Pull item from Inventree and show in item page
        $part_id = $request->id;
        $response = Http::withToken(session('token'), 'Token')->get("http://localhost:8000/api/part/$part_id/.*");
        $part = json_decode($response);
        return view("parts.part_details", compact("part"));
    }

    function edit()
    {
        //Pull item from Inventree and show in itemEdit page
        return view("parts.part_edit");
    }

    function delete()
    {
        //Delete logic here:


        //Return to the inventory view
        return redirect("parts.part");
    }
}
