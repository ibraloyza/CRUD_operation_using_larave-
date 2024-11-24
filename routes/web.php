<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\toDoListController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
 return view('welcome');
});

//Route::post('/saveItemRoute',[toDoListController::class,'saveItem'])->name('saveItem');

Route::post('/items' ,[ItemController::class,'store'])->name('items.store');

Route::get('/',[ItemController::class,'index'])->name('home');