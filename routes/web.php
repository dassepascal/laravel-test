<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\Admin\OptionController;

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
Route::get('/', [HomeController::class, 'index']);

Route::get('/biens', [PropertyController::class, 'index'])->name('property.index');
Route::get('/biens/{property}', [PropertyController::class, 'show'])->name('property.show')->where([
    'id' => $idRedex,
    'slug' => $slugRegex
]);


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('property', PropertyController::class)->except(['show']);
    Route::resource('option', OptionController::class)->except(['show']);
});

Route::get('/test', function () {
    return view('test');
});
