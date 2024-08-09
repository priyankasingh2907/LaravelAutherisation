<?php

namespace App\Http\Controllers;

use App\Models\subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class productSubcategoryController extends Controller
{
    public function index(Request $request){
        if(!empty($request->category_id)){
          
            $subcategory = subcategory::where('category_id',$request->category_id)
            ->orderBy('name','ASc')
            ->get();
            // dd($subcategory);
            return response()->json([
                'status' => 200,
                'subcategory' => $subcategory,
            ]);

        }else{
            return response()->json([
               'status' => true,
               'subcategory' => [],
            ]);
        }

    }
}
