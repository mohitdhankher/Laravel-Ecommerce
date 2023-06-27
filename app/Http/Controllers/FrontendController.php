<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class FrontendController extends Controller
{
    public function index(){
        $products = Product::orderBy('id', 'ASC')->get();
        $data['products'] = $products;
        return view('frontend.home', $data);
    }
    public function cart(){
        $products = Product::orderBy('id', 'ASC')->get(); ///this has to be come from carts table but right now just taking from Product table
        $data['products'] = $products;
        return view('frontend.cart', $data);
    }
}
