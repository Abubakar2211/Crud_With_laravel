<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/index',[StudentController::class,'index']);
Route::post('/index',[StudentController::class,'store']);
Route::get('/view',[StudentController::class,'show']);
Route::get('edit/{id}',[StudentController::class,'edit']);
Route::get('/detail/{id}',[StudentController::class,'detail']);
Route::get('/delete/{id}',[StudentController::class,'destroy']);
Route::post('/upd/{id}',[StudentController::class,'upd']);
