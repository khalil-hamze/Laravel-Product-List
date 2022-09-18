<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //get all products
    public function index()
    {
        return view('products.index',[
            'products' =>Product::Latest()->filter(request(['search']))->paginate(8)
        ]);
    }

    //show Create product form
    public function createForm()
    {
        return view('admin.create');
    }

    //submit data from create form
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'path' => 'mimes:jpeg,jpg,png',
            'description' => 'required'
        ]);
        // dd($formFields['path']);
        if($request->hasFile('path')){
            $formFields['path'] = $request->file('path')->store('logos', 'public');
        }
        Product::create($formFields);
        return redirect('/admin');
    }

    //show manage products page
    public function manage()
    {
        return view('admin.manage',['products'=>Product::Latest()->filter(request(['search']))->paginate(4)]);
    }

    //show Edit form
    public function edit(Product $product) {
        return view('admin.edit', ['product' => $product]);
    }

    //submit edits to update product
    public function update(Request $request, Product $product)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'path' => 'mimes:jpeg,jpg,png',
            'description' => 'required'
        ]);
        if($request->hasFile('path')){
            $formFields['path'] = $request->file('path')->store('logos', 'public');
        }
        $product->update($formFields);
        return redirect('/admin/manage');
    }

    //Delete a product
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/admin');
    }
}
