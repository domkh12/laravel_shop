<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Models\Test;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontendController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test1', function () {
    return view('test1');
});

Route::get('/test2', function () {
    return view('test2');
});

Route::get('/testmodel', function () {
    $test = Test::findOrFail(2);
    dd($test);
});

Route::get('/testdb', function () {
    $test = DB::table('tests')->where('id', 1)->first();
    dd($test);
});

Route::get('/testcontroller', [StudentController::class, 'list']);

Route::get('/test3', [StudentController::class, 'test3']);
Route::get('/test4', [StudentController::class, 'test4']);

Route::get('/category', [CategoryController::class, 'index'])->name("category.list");

Route::get('/category/create', [CategoryController::class, 'create'])->name("category.create");

Route::post('/category', [CategoryController::class, 'store'])->name("category.store");

Route::get("/category/{categoryId}/edit", [CategoryController::class, 'edit'])->name('category.edit');

Route::put("/category/{categoryId}", [CategoryController::class, 'update'])->name('category.update');

Route::delete("/category/{categoryId}", [CategoryController::class, 'destroy'])->name('category.delete');

Route::get('/category/{cateId}', [CategoryController::class, 'show'])->name("category.show");

Route::get('/product',[ProductController::class,'index'])->name('product.index');

Route::get('/product/create',[ProductController::class,'create'])->name('product.create');

Route::post('/product',[ProductController::class,'store'])->name('product.store');

Route::get('/product/{product}',[ProductController::class,'show'])->name('product.show');

Route::delete('/product/{product}',[ProductController::class,'destroy'])->name('product.destroy');

Route::get('/product/{product}/edit',[ProductController::class,'edit'])->name('product.edit');

Route::put('/product/{product}',[ProductController::class,'update'])->name('product.update');

Route::get('/',[FrontendController::class,'index']);