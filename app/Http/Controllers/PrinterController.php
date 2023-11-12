<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrinterController extends Controller
{
    //
    function index(){
        return view("printer");
    }
}
