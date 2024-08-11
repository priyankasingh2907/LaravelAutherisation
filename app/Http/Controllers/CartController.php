<?php

namespace App\Http\Controllers;

use App\Models\product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
$cartContent = cart::content();
$data['cartContent']=$cartContent;
// dd($data);
        return view('Fronts.cart',$data);
    }

    public function addtocart(Request $request)
    {
        $product = product::find($request->id);

        if ($product == null) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'product not found',
                ]
            ); }
            if (cart::count() > 0) {
                // echo ('product already added..');

                $cartitem = Cart::content();
                $prodAlreadyExist= false;

                foreach ($cartitem as  $item) {

                    if($item->id == $product->id){
                        $prodAlreadyExist = true;
                        Cart::update($item->rowId, $item->qty + 1);
                        $status = true;
                        $message = $product->title .'updated..';
                        break;

                    }
                    
                }
                if(!$prodAlreadyExist){
                    Cart::add($product->id, $product->title, 1, $product->price, ['productImage'=>$product->image]);
                    $status = true;
                    $message = $product->title .'added..';
                }else{
                    $status = false;
                    $message = 'This product already exists in your cart..';
                }

            } else {
                echo ('product  added..');
                Cart::add($product->id, $product->title, 1, $product->price, ['productImage'=>$product->image]);

                $status = true;
                $message = $product->title . ' added..';
            }

            return response()->json(
                [
                    'status' => $status,
                    'message' => $message,
                ]
            );
       
       
    }

    public function update(Request $request) {

        $rowId = $request->rowId;
        $qty = $request->qty;
// dd($rowId);
        $itemInfo = Cart::get($rowId);
        $product = Product::find($itemInfo->product_id); 
        if($product->track_qty == 'yes'){
            if($qty <= $product->qty){
                Cart::update($rowId, $qty);  
                $status = true;
                $message = 'Cart updated successfully.';
                Session()->flash("success",$message);


            }else{
    
                $message = 'Request qty ('.$qty.') not available in stock ';
                     $status = false;
                     Session()->flash("error",$message);

            }
        }else{
            Cart::update($rowId, $qty);  
            $status = true;
            $message = 'Cart updated successfully.';
            Session()->flash("success",$message);

        }

        return response()->json([
            'status'=>$status,
            'message'=>$message,
        ]);
        
    }

    public function deleteCart(Request $request) {
        Cart::remove($request->rowId);
        $message = 'Cart deleted successfully.';
        Session()->flash("success",$message);
        return response()->json([
            'status'=>true,
           'message'=>$message,
        ]);
        
    }
}
