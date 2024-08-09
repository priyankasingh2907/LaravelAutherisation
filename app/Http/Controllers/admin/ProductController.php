<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\category;
use App\Models\product;
use App\Models\subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = product::latest()->paginate(5);

        if(!empty($request->get('keyword'))){
            $products = product::where('title', 'LIKE', '%'.$request->get('keyword').'%')
                    ->orWhere('sku', 'LIKE', '%'.$request->get('keyword').'%')
                    ->orWhere('price', 'LIKE', '%'.$request->get('keyword').'%')
                    ->paginate(5);
                        }

        return view('admin.products.list',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = category::latest()->get();
        $subcategory = subcategory::latest()->get();
        $brand = Brand::latest()->get();
        return view('admin.products.create',['categories'=>$categories,'brand'=>$brand,'subcategory'=>$subcategory]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $rules=[
            'title'=>'required',
            'slug'=>'required|unique:products',
            'price'=>'required|numeric',
            'sku'=>'required|unique:products',
            'slug'=>'required',
            'track_qty'=>'required|in:yes,no',
            'category'=>'required',
            'image'=>'required',
            'barcode'=>'required',
            'sub_category'=>'required',
            'fstatus'=>'required',
          
        ];
        $validator = Validator::make($request->all(),$rules);

        if($validator->passes()){

            $img = $request->image;
            $ext = $img->getClientOriginalExtension();
            $imageName = time() . '.' . $ext;
            $img->move(public_path() . '/uploads/products', $imageName);

            
            $product = new product();
            $product->title=$request->title;
            $product->slug=$request->slug;
            $product->description=$request->description;
            $product->image=$imageName;
            // $product->sort_order=$request->
            $product->price=$request->price;
            $product->compare_price=$request->compare_price;
            $product->category_id=$request->category;
            $product->subcategory_id=$request->sub_category;
            $product->brand_id=$request->brand;
            $product->isFeatured=$request->fstatus;
            $product->sku=$request->sku;
            $product->barcode=$request->barcode;
            $product->track_qty=$request->track_qty;
            $product->qty=$request->qty;

            $product->save();
            Session()->flash('success','category created successfully..');

            return response()->json([
                'status' => true,
               'message' => 'category created successfully..',
               'data'=>$product,
            ]);

        }else{

            return response()->json([
                'status' => false,
               'message' => $validator->errors(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    dd();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id,Request $request)
   {     
    $products = product::find($id);
    $categories = category::latest()->get();
    $subcategory = subcategory::latest()->get();
    $brand = Brand::latest()->get();
// dd($products);
return view('admin.products.edit',['products'=>$products,'categories'=>$categories,'brand'=>$brand,'subcategory'=>$subcategory]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $product = product::find($id);
        $rules=[
            'title'=>'required',
            'slug'=>'required|unique:products',
            'price'=>'required|numeric',
            'sku'=>'required|unique:products',
            'slug'=>'required',
            'track_qty'=>'required|in:yes,no',
            'category'=>'required',
            'image'=>'required',
            'barcode'=>'required',
            'sub_category'=>'required',
            'fstatus'=>'required',
          
        ];
        $validator = Validator::make($request->all(),$rules);

        if($validator->passes()){

            $img = $request->image;
            $ext = $img->getClientOriginalExtension();
            $imageName = time() . '.' . $ext;
            $img->move(public_path() . '/uploads/products', $imageName);

            
          
            $product->title=$request->title;
            $product->slug=$request->slug;
            $product->description=$request->description;
            $product->image=$imageName;
            // $product->sort_order=$request->
            $product->price=$request->price;
            $product->compare_price=$request->compare_price;
            $product->category_id=$request->category;
            $product->subcategory_id=$request->sub_category;
            $product->brand_id=$request->brand;
            $product->isFeatured=$request->fstatus;
            $product->sku=$request->sku;
            $product->barcode=$request->barcode;
            $product->track_qty=$request->track_qty;
            $product->qty=$request->qty;

            $product->save();
            Session()->flash('success','category updated successfully..');

            return response()->json([
                'status' => true,
               'message' => 'category updated successfully..',
               'data'=>$product,
            ]);

        }else{

            return response()->json([
                'status' => false,
               'message' => $validator->errors(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destory( $id,Request $request)
    {
        $product = product::find($id);
        $product->delete();
        Session()->flash('success','product data deleted successfully..');

        return response()->json([
            'status' => true,
           'message' => 'product data deleted successfully..',
           
        ]);
    }
}
