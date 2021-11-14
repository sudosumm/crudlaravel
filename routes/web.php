<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('admin',function(){
    return view('admin.index');
});

//Route::get('admin/categories',[\App\Http\Controllers\Admin\CategoryController::class,'index']);
//Route::get('admin/categories/create',[\App\Http\Controllers\Admin\CategoryController::class,'create']);
//Route::get('admin/categories/{id}/edit',[\App\Http\Controllers\Admin\CategoryController::class,'edit']);
//Route::post('admin/categories',[\App\Http\Controllers\Admin\CategoryController::class,'store']);
//Route::patch('admin/categories',[\App\Http\Controllers\Admin\CategoryController::class,'update']);


Route::group(['prefix' =>config('admin.admin_prefix') , 'as' => 'admin.'] , function(){
    Route::resource('categories',CategoryController::class);
    Route::resource('articles',ArticleController::class);
});


