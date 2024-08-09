<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\category;
use App\Models\subcategory;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $category = category::latest()->where('status',1)->get();
        $subcategory = subcategory::latest()->where('status',1)->get();
        $brand= Brand::latest()->where('status',1)->get();
        return view('Fronts.shop',['category'=>$category,'subcategories'=>$subcategory,'brands'=>$brand]);
    }
}
