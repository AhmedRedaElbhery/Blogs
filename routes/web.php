<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ThemeController;
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
/*
Route::get('/', function () {
    return view('welcome');
});
*/


Route::controller(ThemeController::class)->name("theme.")->group(function () {
    Route::get("/", "index")->name("index");
    Route::get("/category/{id}", "category")->name("category");
    Route::get("/contact", "contact")->name("contact");

});

Route::post("/subscribe/store", [SubscriberController::class, "store"])->name("subscribe_store");


Route::post("/contact/store", [ContactController::class, "store"])->name("contact_store");


Route::get('/myblogs', [BlogController::class, 'myblogs'])->name('myblogs');
Route::resource('blogs', BlogController::class)->except('index');

Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store');


require __DIR__ . '/auth.php';
