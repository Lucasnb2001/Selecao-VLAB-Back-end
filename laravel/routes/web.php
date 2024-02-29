<?php

use App\Models\Categorie;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TransactionController;

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

Route::get('/', function () {
    $posts = Transaction::all();
    if(auth()->check()){
        $posts = auth()->user()->userTransactions()->latest()->get();
    }
    
    $categories = Categorie::all();
    return view('home', ['posts' => $posts, 'categories' => $categories]);
});

Route::post('/category', [CategoriaController::class, 'createCategoria']);
Route::delete('/category/{categorie}', [CategoriaController::class, 'deleteCategoria']);

Route::post('/user', [UserController::class, 'createUser']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

Route::post('/transaction', [TransactionController::class, 'createTransaction']);
Route::delete('/transaction/{transaction}', [TransactionController::class, 'deleteTransaction']);