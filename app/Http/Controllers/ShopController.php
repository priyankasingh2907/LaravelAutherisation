<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\category;
use App\Models\product;
use App\Models\subcategory;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request, $categorySlug = null , $subCategorySlug = null)
    {
        $categorySelected='';
        $subCategorySelected='';
        $brandArray = [];

        if(!empty($request->get('brand'))){
            $brandArray = explode(',', $request->get('brand'));
        }

        $category = category::where('status', 1)->get();
        // dd($category);
        $subcategory = subcategory::where('status', 1)->get();
        $brand = Brand::where('status', 1)->get();

          //apply filer
          $products = product::where('status', 1);

          if(!empty($categorySlug)){
            $slugcategory = category::where('slug',$categorySlug)->first();
            $products = $products->where('category_id',$slugcategory->id);
            $categorySelected=  $slugcategory->id;
          }
          if(!empty($subCategorySlug)){
            $slugsubcategorySlug = subcategory::where('slug',$subCategorySlug)->first();
            $products = $products->where('subcategory_id',$slugsubcategorySlug->id);
            $subCategorySelected= $slugsubcategorySlug->id;
          }

         $products= $products->orderBy('id','DESC');
          $products= $products->paginate(12);
        return view('Fronts.shop', ['category' => $category, 'subcategories' => $subcategory, 'brands' => $brand , 'products'=>$products,
        'categorySelected'=>$categorySelected,'subCategorySelected'=>$subCategorySelected
    , 'brandArray'=>$brandArray]);
    }
}
