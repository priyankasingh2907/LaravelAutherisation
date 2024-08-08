<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $brands= Brand::latest();

        if(!empty($request->get('keyword'))){
            $brands = Brand::where('name', 'LIKE', '%'.$request->get('keyword').'%');

        }
        $brands= $brands->paginate(8);
        
        return view('admin.brands.list',['brands'=>$brands]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'slug' => 'required|unique:brands',
            
        ]);
        if ($validator->passes()) {

          

            $category = new Brand();
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->status = $request->status;
            $category->save();

            Session()->flash('success','brand added successfully..');
            return response()->json([
                'status' => true,
                'message' => 'Data saved successfully',
                'data' => $request->all(),

            ]);
        } else {
            // Return with error message
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),

            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id,Request $request)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id,Request $request)
    {
        $brands = Brand::find($id);
        return view('admin.brands.edit', compact('brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $brands = Brand::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'slug' => 'required|unique:brands,slug,'.$brands->id.',id',
            
        ]);
        if ($validator->passes()) {

         
            $brands->name = $request->name;
            $brands->slug = $request->slug;
            $brands->status = $request->status;
            $brands->save();

            Session()->flash('success','brands updated successfully..');
            return response()->json([
                'status' => true,
                'message' => 'Data updated successfully',
                'data' => $request->all(),

            ]);
        } else {
            // Return with error message
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),

            ]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destory( $id)
    {
        $brands = Brand::find($id);
        $brands->delete();
      return back()->with('success','brands deleted successfully..');
    }
}
