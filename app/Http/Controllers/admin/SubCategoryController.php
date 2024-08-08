<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $subcategory= subcategory::select('subcategories.*','categories.name as categoryName')
                                            ->latest('subcategories.id')
                                            ->leftJoin('categories','categories.id','subcategories.category_id');

        if(!empty($request->get('keyword'))){
            $subcategory = subcategory::where('subcategories.name', 'LIKE', '%'.$request->get('keyword').'%');
            // $subcategory = subcategory::orwhere('categories.name', 'LIKE', '%'.$request->get('keyword').'%');

        }
        $subcategory= $subcategory->paginate(10);
        
        return view('admin.subcategory.list',['subcategory'=>$subcategory]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories= category::latest()->get();

        return view('admin.subcategory.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'slug' => 'required|unique:subcategories',
            'Category' => 'required',
        ]);
        if ($validator->passes()) {

            

            $subcategory = new subcategory();
            $subcategory->name = $request->name;
            $subcategory->slug = $request->slug;
            $subcategory->status = $request->status;
            $subcategory->category_id  = $request->Category;
            $subcategory->save();

            Session()->flash('success','subcategory added successfully..');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id,Request $request)
    {
        $categories= category::latest()->get();
        $subcategory = subcategory::find($id);
        return view('admin.subcategory.edit', ['categories'=>$categories,'subcategory'=>$subcategory]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          // dd($request->all());
          $subcategory = subcategory::find($id);
          $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'slug' => 'required|unique:subcategories,slug,'.$subcategory->id.',id',
            'Category' => 'required',
        ]);
        if ($validator->passes()) {
            $subcategory->name = $request->name;
            $subcategory->slug = $request->slug;
            $subcategory->status = $request->status;
            $subcategory->category_id  = $request->Category;
            $subcategory->save();

            Session()->flash('success','subcategory updated successfully..');
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
     * Remove the specified resource from storage.BrandController
     */
    public function destory( $id)
    {
        $subcategory = subcategory::find($id);
        $subcategory->delete();
      return back()->with('success','subcategory deleted successfully..');
    }
}


  