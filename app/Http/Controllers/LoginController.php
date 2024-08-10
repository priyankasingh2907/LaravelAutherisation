<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index (){
        return view('Fronts.login');
    }
    public function store(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password'=>'required|confirmed|min:7|max:255',
        ]);
        if ($validator->passes()) {

          

            Session()->flash('success','User added successfully..');
            return response()->json([
                'status' => true,
                'message' => 'successfully',
              

            ]);
        } else {
            // Return with error message
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),

            ]);
        }
    }
    public function logout (Request $request,$id) {
        echo 'logout';
    }
}
