<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Dashboard.Category.index',[
            'categories'=>Category::latest()->paginate(9)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.Category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();

        if ($request->image != null){
            $path = $request->file('image')->store('CategoryImages');
            $data['image']=$path;
        }
        Category::create($data);
        session()->flash('success', __('main.added_success'));
        return to_route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        return view('Dashboard.Category.show',[
            'category'=>Category::findOrFail($id),
            'products'=>Product::where('category_id',$id)->paginate(10)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($category)
    {
        return view('Dashboard.Category.edit',[
            'category'=>Category::findOrFail($category)
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request,  $id)
    {
        $category = Category::findOrFail($id);
        $data = $request->validated();

        if($request-> image !=null){
            $path = $request->file('image')->store('CategoryImage');
            $data['image']=$path;
        }
        $category->update($data);
        session()->flash('update',__('main.edited_success'));
        return to_route('category.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy( $category)
    {
        Category::destroy($category);
        session()->flash('delete', __('main.deleted_success'));
        return redirect()->back();
    }
}
