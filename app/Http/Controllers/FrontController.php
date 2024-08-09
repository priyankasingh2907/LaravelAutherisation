<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\subcategory;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $featureprod = product::orderBy('id','desc')->where('isFeatured','yes')->where('status',1)->take(8)->get();
        $latestprod = product::orderBy('id','desc')->where('status',1)->take(8)->get();

        return view('Fronts.home',['featureProd'=>$featureprod , 'latest'=>$latestprod]);
    }
}
