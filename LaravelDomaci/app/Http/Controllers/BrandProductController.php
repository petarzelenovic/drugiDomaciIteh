<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class BrandProductController extends Controller
{
    //produkti odredjenog brenda
    
    public function index($brand_id)
    {
        $products=Product::get()->where('brand_id',$brand_id);
        if(is_null($products)){
            return response()->json('Nisu pronadjeni takvi proizvodi',404);
        }return response()->json($products);
    }
}
