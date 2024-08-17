<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
       

          if(Auth::guard('account')->attempt(['email'=>$request->email,'password'=>$request->password],$request->get('remember'))){
          

            if(!Session()->has('url.intended')){

              return  redirect(session()->get('url.intended')); 
            }

            return  redirect()->route('Account.index');
       

          }else{
            return  redirect()->route('login.index')->with('error','Either Email/password is incorrect')->withInput($request->only('email'));
          }
        } else {
            // Return with error message
            return  redirect()->route('login.index')->withErrors($validator)->withInput($request->only('email'));
        }
    }
    public function profile(){
       return view('Fronts.account');
    }
    public function logout (Request $request,$id) {
        Auth::logout();
        return  redirect()->route('login.index')->with('success','successfully logged out')->withInput($request->only('email'));
      
    }
}
