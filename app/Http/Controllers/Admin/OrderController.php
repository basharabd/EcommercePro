<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe;
use Illuminate\Support\Facades\Session;

use PDF;

class OrderController extends Controller
{
    public function cash_order()
    {

        $user = Auth::user();
        $userId = $user->id;

        $items = Cart::where('user_id','=',$userId)->get();

        foreach($items as $item)
        {
            $orders = new Order();

            $orders->name = $item->name;

            $orders->email = $item->email;

            $orders->phone = $item->phone;

            $orders->address = $item->address;

            $orders->user_id = $item->user_id;

            $orders->product_name = $item->product_name;

            $orders->price = $item->price;

            $orders->quantity = $item->quantity;

            $orders->product_id = $item->product_id;

            $orders->image = $item->image;

            $orders->payment_status = 'cash on delivery';

            $orders->delivery_status = 'processing';

            $orders->save();

            $cart_id = $item->id;
            $cart = Cart::find($cart_id);

            $cart->delete();



        }


        return redirect()->back()->with('success', 'We Have Received Your Order . We Will Connect With You Soon.... ');




    }

    public function stripe($totalprice)
    {

        return view('Front.stripe' , compact('totalprice'));

    }

    public function stripePost(Request $request , $totalprice)
    {


        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks For Payment"
        ]);

        $user = Auth::user();
        $userId = $user->id;

        $items = Cart::where('user_id','=',$userId)->get();

        foreach($items as $item)
        {
            $orders = new Order();

            $orders->name = $item->name;

            $orders->email = $item->email;

            $orders->phone = $item->phone;

            $orders->address = $item->address;

            $orders->user_id = $item->user_id;

            $orders->product_name = $item->product_name;

            $orders->price = $item->price;

            $orders->quantity = $item->quantity;

            $orders->product_id = $item->product_id;

            $orders->image = $item->image;

            $orders->payment_status = 'Paid';

            $orders->delivery_status = 'processing';

            $orders->save();

            $cart_id = $item->id;
            $cart = Cart::find($cart_id);

            $cart->delete();



        }


        Session::flash('success', 'Payment successful!');

        return back();
    }


    public function order()
    {
        $orders = Order::all();
        return view('Admin.orders.index' , compact('orders'));
    }

    public function delivered($id)
    {

        $orders = Order::find($id);
        $orders->delivery_status = "delivered";
        $orders->payment_status = "paid";

        $orders->save();

        return redirect()->back();


    }


    public function download_pdf($id)
    {


        $orders = Order::find($id);

        $pdf = PDF::loadView('Admin.pdf.download' , compact('orders' ));
        return $pdf->download('Order Detail.pdf');

    }


    public function search(Request $request)
    {

       $search_data =   $request->search;

       $orders = Order::where('name', 'LIKE', "%$search_data%")
       ->orWhere('phone' , 'LIKE' , "%$search_data%")
       ->orWhere('product_name' , 'LIKE' , "%$search_data%")
       ->get();


       return view('Admin.orders.index' , compact('orders'));
    }


    public function my_order()
    {

        if (Auth::id())
         {

            $user = Auth::user();

            $userId = $user->id;

            $orders = Order::where('user_id','=',$userId)->get();

            return view('Front.order' , compact('orders'));
        }

        else {
          return redirect()->route('login');
        }
    }

    public function cancel_order($id)
    {

        $orders = Order::find($id);

        $orders->delivery_status = 'You Canceled The Order';

        $orders->save();

       

        return redirect()->back();





    }



}
