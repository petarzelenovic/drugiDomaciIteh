<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return ProductResource::collection($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Product::truncate();
        Product::factory()->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|string|max:255',
            'slug'=>'required|string|max:100',
            'description'=>'required|string',
            'price'=>'required',
            'brand_id'=>'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $product=Product::create([
            'name'=>$request->name,
            'slug'=>$request->slug,
            'description'=>$request->description,
            'price'=>$request->price,
            'brand_id'=>$request->brand_id,
            'user_id'=>Auth::user()->id,
        ]);
        return response()->json(['Produkt je napravljen',
        new ProductResource($product)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validator=Validator::make($request->all(),[
            'brand_id'=>'required',
            'name'=>'required|string|max:255',
            'slug'=>'required|string|max:100',
            'description'=>'required|string',
            'price'=>'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        
        $product->brand_id = $request->brand_id; 
        $product->name=$request->name;
        $product->slug=$request->slug;
        $product->description=$request->description;
        $product->price=$request->price;
        
        $product->save();
        return response()->json(['Produkt je azuriran',
        new ProductResource($product)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Product $product_id)
    // {
    //     $pr= Product::find($product_id);
    //     if(is_null($pr)){
    //         return response()->json('Proizvod nije nadjen',404);
    //     }
    //     $pr->delete();
    //     return response()->json('Proizvod je obrisan');
    // }

    public function destroy($product_id)
    {
        Product::destroy($product_id);
        return response()->json('Product is deleted successfully!');
    }
}
