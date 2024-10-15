<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PictureController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PropertyController as AdminPropertyController;


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

$idRedex = '[0-9]+';
$slugRegex = '[a-z0-9-]+';
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/biens', [PropertyController::class, 'index'])->name('property.index');
Route::get('/biens/{slug}-{property}', [PropertyController::class, 'show'])->name('property.show')->where([
    'property' => $idRedex,
    'slug' => $slugRegex
]);

Route::post('/biens/{property}/contact', [PropertyController::class, 'contact'])->name('property.contact')->where('property', $idRedex); 

Route::get('/login',[AuthController::class, 'login'])
->middleware('guest')
->name('login');
Route::post('/login', [AuthController::class, 'doLogin'])->name('doLogin');
Route::delete('/logout', [AuthController::class, 'logout'])
->middleware('auth')
->name('logout');




Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () use($idRedex) {
    Route::resource('property', AdminPropertyController::class)->except(['show']);
    Route::resource('option', OptionController::class)->except(['show']);
    Route::delete('picture/{picture}',[PictureController::class, 'destroy'])
    ->name('picture.destroy')
    ->where('picture', $idRedex);
});


Route::get('/welcome', function () {
    return view('welcome');
});
