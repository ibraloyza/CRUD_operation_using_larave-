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


// Route for showing the edit form
// Route::get('/items/{id}/edit', [ItemController::class, 'edit'])->name('items.edit');

// Route for updating the item
Route::post('/items/{id}', [ItemController::class, 'update'])->name('items.update');


Route::delete('/items/{id}/delete', [ItemController::class, 'destroy'])->name('items.destroy');
