<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendsProductController extends Controller
{
    public function index (){
        return view('Fronts.product');
    }
}
