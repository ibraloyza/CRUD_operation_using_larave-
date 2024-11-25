<?php
use App\Http\Controllers\ItemController;
use App\Http\Controllers\toDoListController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home'); // Home view
})->name('home');

Route::get('/crud', [ItemController::class, 'index'])->name('crud'); // List items

// Route for storing the item
Route::post('/items', [ItemController::class, 'store'])->name('items.store');

// Route for updating the item
Route::put('/items/{id}', [ItemController::class, 'update'])->name('items.update'); // Changed to PUT

// Route for deleting the item
Route::delete('/items/{id}/delete', [ItemController::class, 'destroy'])->name('items.destroy');

// Route Recycle Bin
Route::get('/recycle-bin', [ItemController::class, 'recycleBin'])->name('items.recycle-bin');

// Route Restore
Route::patch('/items/{id}/restore', [ItemController::class, 'restore'])->name('items.restore');

// Route Force Delete (Optional)
Route::delete('/items/{id}/force-delete', [ItemController::class, 'forceDelete'])->name('items.force_delete');
