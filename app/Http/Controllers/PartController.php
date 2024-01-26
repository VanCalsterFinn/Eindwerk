<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Expr\Throw_;
use Throwable;

class PartController extends Controller
{
    //
    public function index(Request $request)
    {
        //check if the page query string has been set
        if (isset($request->page)) {
            $filter = $request->filter;
            $order = $request->order;
            $ordering_filter = ($order == "desc" ? "-" : "+") . "$filter";
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
            isset($response) ? $parts = json_decode($response)->{"results"} : $parts = [];
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
        $response = Http::withToken(session('token'), 'Token')->get("http://localhost:8000/api/part/category/");
        $categories = json_decode($response);
        $response = Http::withToken(session('token'), 'Token')->get("http://localhost:8000/api/stock/location/.*");
        $locations = json_decode($response);
        return view("parts.part_create", compact("categories", "locations"));
    }

    function part_create(Request $request){
        $request->validate([
            'category' => 'required',
            'name' => 'required|max:100',
            'ipn' => 'nullable|max:100',
            'revision' => 'nullable|max:100',
            'description' => 'nullable|max:250',
            'units' => 'nullable|max:20',
            'link' => 'nullable|max:200',
            'default_location' => 'required',
            'default_expiry' => 'required|min:0|max:2147483647',
            'min_stock' => 'required|min:0',
        ]);
        try{
            // Try obtaining a token with given credentials
            $response = Http::withToken(session('token'), 'Token')->post("http://localhost:8000/api/part/.*", [
                'category' => $request->category,
                'name' => $request->name,
                'IPN' => $request->ipn,
                'revision' => $request->revision,
                'description' => $request->description,
                'units' => $request->units,
                'link' => $request->link,
                'default_location' => $request->default_location,
                'default_expiry' => $request->max_expiry ? 2147483647 : $request->default_expiry,
                'minimum_stock' => $request->min_stock,
            ]);
            dd($response);
            report($response);
            return redirect("/part?page=1");
        } catch (Throwable $e) {
            report($e);     
            return redirect("/dashboard");
        }
    }


    function read(Request $request)
    {
        if (isset($request->page)) {
            //Pull item from Inventree and show in item page
            $filter = $request->filter;
            $order = $request->order;
            $ordering_filter = ($order == "desc" ? "-" : "+") . "$filter";
            $input = $request->input;
            $page = $request->page;
            $part_id = $request->id;
            $response = Http::withToken(session('token'), 'Token')->get("http://localhost:8000/api/part/$part_id/.*");
            $part = json_decode($response);
            $stock_json = Http::withToken(session('token'), 'Token')->get("http://localhost:8000/api/stock/.*", [
                "name" => $part->name,
                "limit" => 25,
                "offset" => ($page - 1) * 25,
            ]);
            isset($stock_json) ? $stocks = json_decode($stock_json)->{"results"} : $stocks = [];
            //Catch page counts that go past last showable page
            if ($stocks == null) {
                route('part_details.view', ['id' => $request->id,'page' => '1']);
            }
            foreach ($stocks as $stock) {
                $location_id = $stock->{'location'};
                $location_response = Http::withToken(session('token'), 'Token')->get("http://localhost:8000/api/stock/location/{$location_id}/.*");
                $location_decoded = json_decode($location_response);
                if(is_array($location_decoded)){
                    $stock->{"location"} = $location_decoded[0]->{"name"};
                }
                else{
                    $stock->{"location"} = $location_decoded->{"name"};
                }
            }
            return view("parts.part_details", compact("part", "page", "stocks"));
        }
        route('part_details.view', [
        'id' => $request->id,
        'page' => '1',
        ]);
    }

    //Showing add part stock view
    function add_stock_view(Request $request){
        $part_id = $request->id;
        $response = Http::withToken(session('token'), 'Token')->get("http://localhost:8000/api/stock/location/.*");
        $locations = json_decode($response);
        $response = Http::withToken(session('token'), 'Token')->get("http://localhost:8000/api/part/$part_id/.*");
        $part = json_decode($response);
        $response = Http::withToken(session('token'), 'Token')->get("http://localhost:8000/api/stock/status/");
        $statuses = json_decode($response)->values;
        $response = Http::withToken(session('token'), 'Token')->get("http://localhost:8000/api/currency/exchange/");
        $todayDate = date("Y-m-d");
        return view("parts.part_stock_add", compact("locations", "part", "statuses", "todayDate"));
    }
    //Adding part stock
    function add_stock(Request $request){
        $request->validate([
            'part' => 'required',
            'supplier_part' => 'nullable',
            'stock_location' => 'nullable',
            'quantity' => 'required | min:1',
            'batch_code' => 'nullable|max:100',
            'status' => 'required',
            'expiry_date' => 'nullable',
            'purchase_price' => 'nullable',
            'currency' => 'required',
            'packaging' => 'nullable|max:50',
        ]);
        try{
            // Try obtaining a token with given credentials
            $response = Http::withToken(session('token'), 'Token')->post("http://localhost:8000/api/stock/.*", [
                "part" => $request->id,
                "supplier_part" => $request->supplier_part,
                "stock_location" => $request->stock_location,
                "quantity" => $request->quantity,
                "batch_code" => $request->batch_code,
                "status" => $request->status,
                "expiry_date" => $request->expiry_date,
                "purchase_price" => $request->purchase_price,
                "purchase_price_currency" => $request->currency,
                "packaging" => $request->packaging,
                "delete_on_deplete" => true,
            ]);
            report($response);
            return redirect("/part/$request->id", ["id" => $request->id]);
        } catch (Throwable $e) {
            report($e);     
            return redirect("/part?page=1");
        }

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
