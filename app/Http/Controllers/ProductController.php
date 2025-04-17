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
        $return = "Product not found";
        
        $product = Product::find($id);

        if($product){}
            $return = $product;

        return response()->json($return);
    }

    public function verificar_pedido($id){
        $return = "Product not found";
        
        $product = Product::find($id);

        if($product){}
            $return = $product;

        return response()->json("->".$return);
    }


    public function update($id, Request $request){
        $return = "Product Update!";

        $product = Product::find($id);

        if($product){
            if(!$product->update($request->all())){
                $return = "Product not Update!.";
            };
        } else {
            $return = "Product Not Found!";
        }

        return response()->json($return);
    }

    public function destroy($id){
        $return = "Product Deleted!";

        $product = Product::find($id);

        if($product){
            if(!$product->delete()){
                $return = "Product not Deleted!.";
            };
        } else {
            $return = "Product Not Found!";
        }

        return response()->json($return);
    }
}
