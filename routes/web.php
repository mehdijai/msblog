<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\NewsletterController;

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

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/category/{slug}', [PostController::class, 'category'])->name('category');

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/post/{slug}', [PostController::class, 'view'])->name('post');

Route::get('/modules', [ModuleController::class, 'index'])->name('modules');
Route::get('/module/{slug}', [ModuleController::class, 'view'])->name('module');

Route::get('/about', [PostController::class, 'about'])->name('about');
Route::get('/contact', [PostController::class, 'contact'])->name('contact');

Route::post('/contact/send', [FormsController::class, 'contact'])->name('contact.send');
Route::post('/newsletter/subscribe', [NewsletterController::class, 'request'])->name('newsletter.request');
Route::get('/newsletter/confirm', [NewsletterController::class, 'confirm'])->name('newsletter.confirm');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('test', function () {
    
});