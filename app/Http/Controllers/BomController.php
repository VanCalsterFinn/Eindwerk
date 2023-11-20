<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BomController extends Controller
{
    //
    public function index(){
        return view("bill_of_material.bill_of_material");
    }
    public function read(){
        return view("bill_of_material.bill_of_material_read");
    }
    public function create(){
        return view("bill_of_material.bill_of_material_create");
    }
}
