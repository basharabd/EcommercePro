<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{


    public function add_cart(Request $request,$id)
    {





        if (Auth::id())
        {

         $user = Auth::user();

        // $userId = $user->id;

         $products = Product::find($id);

         $carts = new Cart();

         $carts->name = $user->name;

         $carts->email = $user->email;

         $carts->phone = $user->phone;

         $carts->address = $user->address;

         $carts->product_name = $products->name;

      //   $carts->price = $products->price * $request->quantity;

         if ($products->discount_price)
          {
            $carts->price = $products->discount_price * $request->quantity;


          }
         else {
            $carts->price = $products->price *$request->quantity;


         }

         $carts->quantity = $request->quantity;



         $carts->product_id = $products->id;

         $carts->user_id = $user->id;

         $carts->image = $products->image;


        //  dd($carts);
         $carts->save();

         Alert::success('Product Added Successfully' , 'We have Added product to the cart');

         return redirect()->back();



        }

        else
        {
            return redirect()->route('login');
        }
    }


    public function show_cart()
    {
        if (Auth::id())
         {
            $IDuser = Auth::user()->id;
            $carts = Cart::where('user_id' , '=' ,$IDuser)->get();

            return view('Front.cart',compact('carts'));

        }
        else {

            return view('auth.login');
        }

    }

    public function remove_cart($id)
    {
        $carts = Cart::find($id);
        $carts->delete();
        return redirect()->back();

    }


}
