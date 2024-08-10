<?php

namespace App\Http\Controllers;

use App\Models\contactUs;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index (){
        return view('Fronts.contact-us');
    }
    public function store(Request $request)  {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required',
            'subject'=>'required',
            'message'=>'required',
        ]);
        if ($validator->passes()) {

            $contactUs = new contactUs();
            $contactUs->name = $request->name;
            $contactUs->email = $request->email;
            $contactUs->subject = $request->subject;
            $contactUs->message = $request->message;
            $contactUs->save();

            Session()->flash('success','Message added successfully..');
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
