<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Laravel\Prompts\confirm;

class InventoryController extends Controller
{
    //
    function index(){
        return view("parts.inventory");
    }

    function create(){
        return view("parts.item_create");
    }

    function read(){
        //Pull item from Inventree and show in item page
        return view("parts.item");
    }

    function edit(){
        //Pull item from Inventree and show in itemEdit page
        return view("parts.item_edit");
    }

    function delete(){
        //Delete logic here:


        //Return to the inventory view
        return redirect("parts.inventory");
    }
}
