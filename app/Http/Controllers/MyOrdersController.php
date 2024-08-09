<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyOrdersController extends Controller
{
    public function index (){
        return view('Fronts.my-orders');
    }
}
