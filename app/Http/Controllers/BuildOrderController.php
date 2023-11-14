<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuildOrderController extends Controller
{
    public $required_parts = [];

    //
    public function index(){
        return view("build_orders.build_orders");
    }
    public function read(){
        return view("build_orders.build_orders_read");
    }
    public function create(){
        return view("build_orders.build_orders_create");
    }
}
