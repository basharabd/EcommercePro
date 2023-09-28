<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('Admin.products.index' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('Admin.products.create' , compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category'=>'required',
            'quantity'=>'required|integer',
            'name'=>'required|string',
            'description'=>'nullable|string',
            'status'=>'required',
            'image'=>'image|mimes:png,jpg, jpeg',
            'price'=>'required',
        ]);

        $data = $request->except('image');

        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = $file->store('uploads/products' , [
                'disk'=>'uploads',
            ]);

            $data['image'] = $path;
        }

        $products = Product::create($data);


        return redirect()->route('products.index')->with('success' , 'Product Add Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::find($id);
        return view('Front.product_detail' , compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::findOrFail($id);
        $categories = Category::all();
        return view('Admin.products.edit' , compact('products' , 'categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $request->validate([
            'category'=>'required',
            'quantity'=>'required|integer',
            'name'=>'required|string',
            'description'=>'nullable|string',
            'status'=>'required',
            'image'=>'image|mimes:png,jpg, jpeg',
            'price'=>'required',
            'discount_price'=>'nullable',
        ]);
        $products = Product::findOrFail($id);
        $old_image = $products->image;

        $data = $request->except('image');

        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = $file->store('uploads/products' , [
                'disk'=>'uploads',
            ]);

            $data['image'] = $path;
        }

        $products->update($data);

        if($old_image && isset($data['image'])){

            Storage::disk('uploads')->delete($old_image);

        }


        return redirect()->route('products.index')->with('success' , 'Product Add Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::findOrFail($id);
        $products->delete();

        if($products->image){
            Storage::disk('uploads')->delete($products->image);

        }

        return redirect()->route('products.index')->with('success' , 'Product Deleted Successfully');

    }
}
