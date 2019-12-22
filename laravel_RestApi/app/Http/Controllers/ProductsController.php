<?php

namespace App\Http\Controllers;

use App\Product;
use Validator;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required'
        ]);

        if($validator->fails()) 
        {
            $response = array('response' => $validator->messages(), 'success' => false);
            return $response;
        } 
        else 
        {
            $product = new Product;
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->save();
            return response()->json($product);
        }
    }

    public function show($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required'
        ]);

        if($validator->fails()) 
        {
            $response = array('response' => $validator->messages(), 'success' => false);
            return $response;
        } 
        else 
        {
            $product = Product::find($id);
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->save();
            return response()->json($product);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        $response = array('response' => 'Product deleted successfully', 'success' => true);
        return $response;
    }
}
