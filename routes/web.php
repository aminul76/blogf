<?php

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

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WebsiteSettingsController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PluginController;


// Route::get('/', function () {
//     return view('frontend.index');
// });

Route::get('/', [FrontendController::class, 'index'])->name('website.index');
Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware(['auth', 'admin'])->group(function () {
   
    Route::resource('categories', CategoryController::class);

    Route::resource('posts', PostController::class);

    Route::resource('plugins', PluginController::class);

    Route::get('/website-settings/edit', [WebsiteSettingsController::class, 'edit'])->name('website-settings.edit');

    Route::put('/website-settings/update', [WebsiteSettingsController::class, 'update'])->name('website-settings.update');


    Route::get('change-password', [WebsiteSettingsController::class,'changepassword'])->name('changepassword');

    Route::post('change-password-store', [WebsiteSettingsController::class,'changepasswordstore'])->name('change.password.store');

});




Route::get('/all-blogs', [FrontendController::class, 'blogs'])->name('website.blogs');

Route::get('/{post_custom_url}', [FrontendController::class, 'details'])->name('website.details');

Route::get('page/{category_url}', [FrontendController::class, 'categoriesdetails'])->name('website.categories');


