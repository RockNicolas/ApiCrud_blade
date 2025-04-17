<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
    {
    public function index(){
        $product = Product::all()->toArray();
        return array_reverse($product);
    }

    public function store(Request $request){
        $product = new Product([
            'name' => $request->input('name'),
            'mail' => $request->input('mail'),
            'detail' => $request->input('detail'),
        ]);

        $product->save();
        return response()->json('Product Create!');
    }   

    public function show($id){
        $product= Product::find($id);
        return response()->json($product);
    }

    public function update($id, Request $request){
        $product = Product::find($id);
        $product->update($request->all());

        return response()->json('Product Update!');
    }

    public function destroy($id){
        $product = Product::find($id);
        $product->delete();

        return response()->json('Product Deleted!');
    }
}
