<?php

use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class, 'index']);

Route::get('/about', [MainController::class, 'about'])->name('about');

Route::get('/tasks', [MainController::class, 'tasks'])->name('tasks');
Route::post('/tasks/check', [MainController::class, 'tasks_check'])->name('tasks_check');
Route::delete('/tasks/{id}', [MainController::class, 'tasks_delete'])->name('tasks_delete');
Route::post('/tasks/{id}/edit', [MainController::class, 'tasks_edit'])->name('tasks_edit');

Route::get('/review', [MainController::class, 'review'])->name('review');
Route::post('/review/check', [MainController::class, 'review_check'])->name('review_check');
Route::delete('/review/{id}', [MainController::class, 'review_delete'])->name('review_delete');
Route::get('/review/all/{id}', [MainController::class, 'review_page'])->name('review_page');
Route::post('/review/{id}/edit', [MainController::class, 'review_edit'])->name('review_edit');

Route::get('/login', function () {
     // return view('login');
});
// Route::get('/about', function () {
//     return view('about');
// });

// Route::get('/writes/{nickname}', function ($nickname) {
//     return '123';//view('writes');
// });


