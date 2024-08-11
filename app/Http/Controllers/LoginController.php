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
            'password'=>'required|min:7|max:255',
        ]);
        if ($validator->passes()) {

          

            // Session()->flash('success','User added successfully..');
            // return response()->json([
            //     'status' => true,
            //     'message' => 'successfully',
              

            // ]);
        } else {
            // Return with error message
            return  redirect()->route('login.index')->withErrors($validator)->withInput($request->only('email'));
        }
    }
    public function logout (Request $request,$id) {
        echo 'logout';
    }
}
