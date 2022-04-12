<?php

use App\Http\Controllers\Article\CommentController;
use App\Http\Controllers\Article\ArticleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', [ArticleController::class,'index']);

Route::get('/articles',[ArticleController::class,'index']);

Route::get('/articles/detail/{id}',[ArticleController::class,'detail']);

Route::get('/articles/add', [ArticleController::class,'add']);

Route::post('/articles/add', [ArticleController::class,'create']);

Route::get('/articles/delete/{id}', [ArticleController::class,'delete']);

Route::post('/comments/add', [CommentController::class,'create']);

Route::get('/comments/delete/{id}', [CommentController::class,'delete']);
    


// Route::get('/articles/detail',function(){
//     return 'Article Detail';
// })->name('article.detail');

// Route::get('/articles/more',function(){
//     return redirect()->route('articles.detail');
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
