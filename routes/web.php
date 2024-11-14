<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SampleController;
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

Route::get('/sample',[SampleController::class,'index'])->name('sample.index');
Route::post('/newsample',[SampleController::class,'generate'])->name('new-sample');

Route::get('/traits',[BlogController::class,'index'])->name('blog.traits');

Route::get('/post/trashed',[PostController::class,'trashed'])->name('post.trash');
Route::get('/post/{id}/restore',[PostController::class,'restore'])->name('post.restore');
Route::delete('/post/{id}/force-delete',[PostController::class,'force'])->name('post.force-delete');
Route::resource('post',PostController::class);
