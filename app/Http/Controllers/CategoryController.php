<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(){
        return view("categories.category");
    }

    public function create(){
        return view("categories.category_create");
    }
}
