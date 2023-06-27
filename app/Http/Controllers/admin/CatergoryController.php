<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CatergoryController extends Controller
{
    public function index(){
        $categories =Category::latest()->paginate(10);
        return view('admin.category.list',compact('categories'));
    }
    public function create(){
        return view('admin.category.create');
    }
    public function store(Request $request){
        $validator = Validator:: make($request->all(),[
            'name'=>'required',
            'slug' => 'required|unique:categories']);
    
            if($validator->passes()){
                  $category = new Category();
                  $category->name = $request->name;
                  $category->slug = $request->slug;
                  $category->status = $request->status;
                 
                  $category->save();
                  $request->session()->flash('success', 'Category Created Succesfully');

                  return response()->json(['status'=>true,'message'=>'Category Created Succesfully']);
    
            }else{
                return response()->json(['status'=>false,'errors'=>$validator->errors()]);
            }
    }
    public function edit($categoryId, Request $request){
        $category = Category::find($categoryId);
        if(empty($category)){
            return redirect()->route('categories.index');
        }
        return view('admin.category.edit',compact('category'));
    }
    public function update(){
        
    }
    public function destroy($categoryId, Request $request){
        $category = Category::find($categoryId);
        if(empty($category)){
            return redirect()->route('categories.index');
        }
        $category->delete();
        $request->session()->flash('success','Category Deleted Succesfully');
        response()->json(['status'=>true,'message'=>'Category Deleted Succesfully']);
    }
}
