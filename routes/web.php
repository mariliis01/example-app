<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ClientController;
use App\Models\Author;
use App\Models\Client;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test',function() {
    return Client::first()->orders;
});

//tahan saada Index

//Route::get('/authors', [AuthorController::class, 'index']);

Route::resource('authors', AuthorController::class);

Route::resource('clients', ClientController::class);