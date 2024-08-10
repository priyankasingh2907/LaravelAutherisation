<?php

namespace App\Http\Controllers;

use App\Models\register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    public function index (){
        return view('Fronts.register');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required',
            'phone'=>'required',
            'password'=>'required|confirmed|min:7|max:255',
        ]);
        if ($validator->passes()) {

            $register = new register();
            $register->name = $request->name;
            $register->email = $request->email;
            $register->phone = $request->phone;
            $register->password = $request->password;
            $register->save();

            Session()->flash('success','User added successfully..');
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

}
