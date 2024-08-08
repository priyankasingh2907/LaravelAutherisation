<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $category= category::latest();

        if(!empty($request->get('keyword'))){
            $category = category::where('name', 'LIKE', '%'.$request->get('keyword').'%');

        }
        $category= $category->paginate(8);
        
        return view('admin.category.list',['category'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'slug' => 'required|unique:categories',
            'image' => 'required',
        ]);
        if ($validator->passes()) {

            $img = $request->image;
            $ext = $img->getClientOriginalExtension();
            $imageName = time() . '.' . $ext;
            $img->move(public_path() . '/uploads/category', $imageName);


            $category = new category();
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->status = $request->status;
            $category->image = $imageName;
            $category->save();

            Session()->flash('success','category added successfully..');
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
     * Show the form for editing the specified resource.BrandController
     */
    public function edit( $id,Request $request)
    {
        $category = category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $category = category::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'slug' => 'required|unique:categories,slug,'.$category->id.',id',
            'image' => 'required',
        ]);
        if ($validator->passes()) {

            $img = $request->image;
            $ext = $img->getClientOriginalExtension();
            $imageName = time() . '.' . $ext;
            $img->move(public_path() . '/uploads/category', $imageName);

            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->status = $request->status;
            $category->image = $imageName;
            $category->save();

            Session()->flash('success','category updated successfully..');
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
        $category = category::find($id);
        $category->delete();
      return back()->with('success','category deleted successfully..');
    }
}
