<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
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
Route::get('/search/{q?}', [BookController::class,'search']);
Route::get('/', function(){
    return view('home');
});
Route::post('/avaliar', [BookController::class, 'avaliar'])->name('avaliar');
Route::get('/reacao', [BookController::class, 'buscarLivro'])->name('buscarLivro');