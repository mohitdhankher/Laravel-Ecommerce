<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\CatergoryController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\FrontendController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [FrontendController::class, 'index'])->name('frontend.home');
Route::get('/cart', [FrontendController::class, 'cart'])->name('frontend.cart');
// Route::get('/', function () {
//     return view('welcome');
// });





Route::group(['prefix'=>'admin'], function(){
    Route::group(['middleware'=>'admin.guest'], function(){

        Route::get('/login', [AdminLoginController::class, 'index']
        )->name('admin.login');
        Route::post('/authenticate', [AdminLoginController::class, 'authenticate']
        )->name('admin.authenticate');

    });
    Route::group(['middleware'=>'admin.auth'], function(){
        Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
        Route::get('/logout', [HomeController::class, 'logout'])->name('admin.logout');

        //Category routes
        Route::get('/categories', [CatergoryController::class, 'index'])->name('categories.index');
        Route::get('/categories/create', [CatergoryController::class, 'create'])->name('categories.create');
        Route::post('/categories', [CatergoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/{category}/edit', [CatergoryController::class, 'edit'])->name('categories.edit');
        Route::delete('/categories/{category}', [CatergoryController::class, 'destroy'])->name('categories.delete');

        //Product routes
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        // Route::get('/categories/{category}/edit', [CatergoryController::class, 'edit'])->name('categories.edit');
        // Route::delete('/categories/{category}', [CatergoryController::class, 'destroy'])->name('categories.delete');

        Route::get('/getSlug', function (Request $request){
            $slug='';
            // Console.log('++++++',$request);
            if(!empty($request->title)){
                $slug = Str::slug($request->title);
            }
            return response()->json(['status'=> true, 'slug'=>$slug]);
        })->name('getSlug');
         
    });
});


