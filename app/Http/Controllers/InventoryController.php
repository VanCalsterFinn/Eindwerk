<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Laravel\Prompts\confirm;

class InventoryController extends Controller
{
    //
    function index(){
        return view("inventory");
    }

    function create(){
        return view("itemCreate");
    }

    function read(){
        //Pull item from Inventree and show in item page
        return view("item");
    }

    function edit(){
        //Pull item from Inventree and show in itemEdit page
        return view("itemEdit");
    }

    function delete(){
        //Delete logic here:

        
        //Return to the inventory view
        return redirect("inventory");
    }
}
