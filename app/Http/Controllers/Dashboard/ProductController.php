<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Dashboard.Product.index',[
            'products'=>Product::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.Product.create',[
            'categories'=>Category::pluck('name','id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data =$request->validated();
        if($request->image !=null){
          $path = $request->file('image')->store('ProductImages');
          $data['image']=$path;
        }

        $barcode = ucwords(str_replace(' ', '-', $data['barcode']));
        $data['barcode']=$barcode;
        Product::create($data);
        session()->flash('success', __('main.added_success'));
        return to_route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show( $product)
    {
        return view('Dashboard.Product.show',[
            'product'=>Product::findOrFail($product)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        return view('Dashboard.Product.edit',[
            'product'=> Product::findOrFail($id),
            'categories' => Category::pluck('name','id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request,  $id)
    {
        $product = Product::findOrFail($id);
        $data =$request->validated();

        if ($request->image != null){
            $path = $request->file('image')->store('ProductImages');
            $data['image']=$path;
        }
        $product->update($data);
        session()->flash('success', __('main.edited_success'));
        return to_route('product.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy( $product)
    {
        Product::destroy($product);
        session()->flash('delete', __('main.deleted_success'));
        return redirect()->back();
    }
}
