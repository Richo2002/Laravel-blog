<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use GuzzleHttp\Middleware;
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

Route::get('/', [ArticleController::class, 'showAll'])->name('accueil');

Route::group(['middleware' => 'auth'], function () {
      Route::get('/addArticle', [ArticleController::class, 'addcreate'])->name('addArticle');

      Route::post('/addArticle', [ArticleController::class, 'store']);

      Route::get('/updateArticle/{id}', [ArticleController::class, 'updatecreate'])->name('updateArticle');

      Route::post('/updateArticle/{id}', [ArticleController::class, 'update']);

      Route::get('/deleteArticle/{id}', [ArticleController::class, 'destroy'])->name('deleteArticle');

      Route::get('/deleteComment/{id}', [CommentController::class, 'deleteComment'])->name('deleteComment');
});



Route::get('/seeMore/{id}', [ArticleController::class, 'show'])->name('seeMore');
Route::post('/seeMore/{id}', [CommentController::class, 'makeComment']);

// Route::get('/dashboard', function () {
//      return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
