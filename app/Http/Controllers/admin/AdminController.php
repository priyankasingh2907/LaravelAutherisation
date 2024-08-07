<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login.login');
    }
    public function authenticate(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->passes()) {

            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
                // dd(Auth::guard('admin')->user()->email);
               
               $admin = Auth::guard('admin')->user();

               if($admin->role == 1){
                return redirect()->route('admin.dashboard')->with('success', 'Welcome');
         
            }else{
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->withErrors($validator)->withInput($request->only('email'))->with('error', 'You are not autherized to access admin panel.');
       
            }
                  } else {
                    return redirect()->route('admin.login')->withErrors($validator)->withInput($request->only('email'))->with('error', 'Either your email/password is incorrect.');
                  }
        } else {
            return redirect()->route('admin.login')->withErrors($validator)->withInput($request->only('email'))->with('error', 'Either your email/password is incorrect.');
        }
    }
    public function create()
    {
        return view('admin.dashboard.app');
    }
    public function logout()
{
    Auth::guard('admin')->logout();
    return redirect()->route('admin.login');
}}
