<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/items', [App\Http\Controllers\ItemController::class, 'index']);
Route::get('/search', [App\Http\Controllers\ItemController::class, 'search']);
Route::get('/user/list', [App\Http\Controllers\UserController::class, 'list']);


Route::middleware([ 'admin'])->group(function () {
    Route::get('/items/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/itemAdd', [App\Http\Controllers\ItemController::class, 'itemAdd']);
    Route::get('item/Edit/{id}', [App\Http\Controllers\ItemController::class, 'Edit']);
    Route::post('/itemEdit', [App\Http\Controllers\ItemController::class, 'itemEdit']);
    Route::get('/itemDelete/{id}',[App\Http\Controllers\ItemController::class, 'itemDelete']);
    Route::get("/user/edit/{id}", [App\Http\Controllers\UserController::class, "edit"]);
    Route::post("/user/edit/{id}",[App\Http\Controllers\UserController::class, "useredit"]);
    Route::post("/userdelete/{id}",[App\Http\Controllers\UserController::class, "userdelete"]);
});