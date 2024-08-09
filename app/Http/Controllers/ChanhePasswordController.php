<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChanhePasswordController extends Controller
{
    public function index (){
        return view('Fronts.change-password');
    }
}
