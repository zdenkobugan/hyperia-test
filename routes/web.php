<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\BookstoreController;
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

Route::get('/', [BooksController::class, 'index']);
Route::get('books/', [BooksController::class, 'index']);
Route::get('books/search/{searchKeyword}', [BooksController::class, 'search'])->name('books.search');
Route::post('books/search', [BooksController::class, 'processSearch'])->name('books.processSearch');
Route::get('bookstore/delete/{bookstore}', [BookstoreController::class, 'delete'])->name('bookstore.delete');
Route::resource('bookstore', BookstoreController::class);
