<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Alert;


class HomeController extends Controller
{

    public function index()
    {




        $products = Product::paginate(6);

        return view('Front.index', compact('products'));

    }



    public function redirect()
    {
        $user_type =Auth::user()->user_type;

        if($user_type =='admin')
        {

            $total_product = Product::all()->count();

            $total_order = Order::all()->count();

            $total_user = User::all()->count();

            $order_delivered = Order::where('delivery_status' , '=', 'delivered')->get()->count();

            $order_processing = Order::where('delivery_status' , '=', 'processing')->get()->count();

            $orders = Order::all();

            $total_revenue = 0;

            foreach($orders as $order)
            {

                $total_revenue = $total_revenue + $order->price;

            }






            return view('Admin.home', compact('total_product' , 'total_order' , 'total_user' , 'order_delivered' , 'order_processing' , 'total_revenue'));

        }
        else {

            $products = Product::paginate(9);

            return view('Front.index' , compact('products'));

        }
    }


    public function search_product(Request $request)
    {

        $search_product = $request->search;

        $products = Product::where('name' , 'LIKE' , "%$search_product%")
        ->orWhere('category' , 'LIKE' ,"%$search_product%")
        ->get();

        return view('Front.index' , compact('products'));
    }


    public function products()
    {

        $products = Product::paginate(6);
        return view('Front.all_products' , compact('products'));
    }

    public function view_all_product()
    {

        $products = Product::all();

      //  dd($products);



        return view('Front.view_all_product' , compact('products'));




    }
}
