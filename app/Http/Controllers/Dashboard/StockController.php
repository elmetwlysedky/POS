<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{


    public function index()
    {
        return view('Dashboard.Stock.index',[
            'stock' => Stock::latest()->paginate(10)
        ]);
    }


    public function create()
    {
        return view('Dashboard.Stock.create',[
            'products' => Product::pluck('name','id')
        ]);
    }


    public function store(Request $request)
    {
        $data= $request->validate([
            'product_id'=>'required',
            'quantity' => 'required|numeric']);
        Stock::create($data);
        session()->flash('success', __('main.added_success'));
        return to_route('stock.index');
    }


    public function show(Stock $id)
    {
        return view('Dashboard.Stock.show',[
            'product'=> Product::findOrFail($id)
        ]);
    }

    public function edit( $id)
    {
        return view('Dashboard.Stock.edit',[
            'stock' => Stock::findOrFail($id),
            'products' => Product::pluck('name','id')
        ]);
    }


    public function update(Request $request,  $id)
    {
        $stock = Stock::findOrFail($id);

        $data= $request->validate([
            'product_id'=>'required',
            'quantity' => 'required|numeric']);
        $stock->update($data);
        session()->flash('success', __('main.edited_success'));
        return to_route('stock.index');

    }


    public function destroy( $id)
    {
        Stock:: destroy($id);
        session()->flash('delete', __('main.deleted_success'));
        return redirect()->back();
    }
}
