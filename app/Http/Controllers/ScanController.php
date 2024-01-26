<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ScanController extends Controller
{
    //
    function index(){
        return view("scan");
    }

    function scan(Request $request){
        $part_id=0;
        $partnumber = $request->barcode;
        $response = Http::withToken(session('_token'), 'Bearer')->get("https://api.mouser.com/api/v2/search/$partnumber");
        dd($response);
        return redirect("/part/$part_id?page=1");
    }
}
