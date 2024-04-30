<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Expr\Throw_;
use Throwable;

class PartController extends Controller
{
    //
    public function index(Request $request)
    {
        // Extract parameters from the request
        $input = $request->input('search');
        $order = $request->input('order');
        $order_by = $request->input('order_by');
        $ordering = ($order == "desc" ? "-" : "+") . "$order_by";
        $page = $request->input('page', 1); // Default to page 1 if not provided

        // Define pagination parameters
        $perPage = 25;
        $offset = ($page - 1) * $perPage;

        // Make API request with pagination parameters
        $response = Http::withToken(session('token'), 'Token')->get("http://inventree.localhost/api/part/", [
            "ordering" => $ordering,
            "search" => $input,
            "limit" => $perPage,
            "offset" => ($request->input('page', 1) - 1) * 10,
        ]);

        if ($response->successful()) {
            // Parse the JSON response
            $data = json_decode($response);

            // Extract items from the response
            $items = $data->{'results'};

            // Create a LengthAwarePaginator instance to handle pagination
            $paginator = new LengthAwarePaginator(
                $items,
                $data->{'count'},
                25, // Number of items per page
                $request->input('page', 1), // Current page
                ['path' => $request->url(), 'query' => $request->query()]
            );

            return view('parts.part', compact('paginator', 'order_by', 'order'));
        } else {
            // Handle unsuccessful API response
            return view('parts.error');
        }
    }


    function create()
    {
        $response = Http::withToken(session('token'), 'Token')->get("http://inventree.localhost/api/part/category/");
        $categories = json_decode($response);
        $response = Http::withToken(session('token'), 'Token')->get("http://inventree.localhost/api/stock/location/");
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
            $response = Http::withToken(session('token'), 'Token')->post("http://inventree.localhost/api/part/", [
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
            $response = Http::withToken(session('token'), 'Token')->get("http://inventree.localhost/api/part/$part_id/");
            $part = json_decode($response);
            $stock_json = Http::withToken(session('token'), 'Token')->get("http://inventree.localhost/api/stock/", [
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
                $location_response = Http::withToken(session('token'), 'Token')->get("http://inventree.localhost/api/stock/location/{$location_id}/");
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
        $response = Http::withToken(session('token'), 'Token')->get("http://inventree.localhost/api/stock/location/");
        $locations = json_decode($response);
        $response = Http::withToken(session('token'), 'Token')->get("http://inventree.localhost/api/part/$part_id/");
        $part = json_decode($response);
        $response = Http::withToken(session('token'), 'Token')->get("http://inventree.localhost/api/stock/status/");
        $statuses = json_decode($response)->values;
        $response = Http::withToken(session('token'), 'Token')->get("http://inventree.localhost/api/currency/exchange/");
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
            $response = Http::withToken(session('token'), 'Token')->post("http://inventree.localhost/api/stock/", [
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
