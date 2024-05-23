<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatogeryController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/categories',  [CatogeryController::class,'index']);
Route::get('categories/create',[CatogeryController::class,'create']);
Route::post('categories/create',[CatogeryController::class,'store']);
Route::get('categories/{id}/edit',[CatogeryController::class,'edit']);
Route::put('categories/{id}/edit',[CatogeryController::class,'update']);
Route::get('categories/{id}/delete',[CatogeryController::class,'delete']);
