<?php

namespace App\Http\Controllers;

use App\Models\country;
use App\Models\CustomerAddress;
use Gloudemans\Shoppingcart\Facades\Cart;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


// use Illuminate\Support\Facades\Session as FacadesSession;
class CheckoutController extends Controller
{
    public function index()
    {
        // if user is not logged in
        if(Cart::count() == 0){
         return redirect()->route('cart.index');
        }
        // if user is not logged in
        if(Auth::check() == false){
            if(!Session()->has('url.intended')){
                Session(['url.intended'=>url()->current()]);

            }
            return redirect()->route('login.index');  
        }

        Session()->forget('url.intended');

        $countries = country::get();

        return view('Fronts.checkout', ['countries' => $countries]);
    }
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'country' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'mobile' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'please fix the errors',
                'status' => false,
                'errors' => $validator->errors(),
            ]);



           CustomerAddress::updateOrCreate([
           'user_id'=>1,
           'first_name' => $request->first_name,
          'last_name' => $request->last_name,
            'mobile' => $request->mobile,
           'email' => $request->name,
            'appartment' => $request->appartment,
            'country_id' => $request->country,
           'address' => $request->address,
          'city' => $request->city,
            'zip' => $request->zip,
           ]);
            

            return response()->json([
                'message' => 'Customer Address added successfully',
                'status' => true,
                'data' => $customer,
            ]);
        }
    }
}
