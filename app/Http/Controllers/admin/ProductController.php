<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
class ProductController extends Controller
{
    public function index(){
        $products = Product::latest('id')->paginate();
        $data['products'] = $products;
        return view('admin.products.list', $data);
    }
    public function create(){
        $data =[];
        $categories = Category::orderBy('name','ASC')->get();

        $data['categories'] =$categories;
        return view('admin.products.create',$data);
    }

    public function store(Request $request){
        $validator = Validator:: make($request->all(),[
            'title'=>'required',
            'slug' => 'required']);
    
            if($validator->passes()){
                  $product = new Product();
                  $product->title = $request->title;
                  $product->slug = $request->slug;
                  $product->price = $request->price;
                  $product->qty = $request->qty;
                  $product->status = $request->status;
                  $product->category_id = $request->category;
                  $product->description = $request->description;
                  $product->save();
                  $request->session()->flash('success', 'Category Created Succesfully');

                  return response()->json(['status'=>true,'message'=>'Category Created Succesfully']);
    
            }else{
                return response()->json(['status'=>false,'errors'=>$validator->errors()]);
            }
    }
}
