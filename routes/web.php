<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaticPageController;
use Illuminate\Support\Facades\App;
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
require __DIR__ . '/auth.php';

Route::get('/', function () {
    return redirect('en/homepage');
});

Route::prefix('/{locale}/')->group(function () {
    $locale = request()->segment(1);
    if (!in_array(request()->segment(1), ['en', 'am'])) {
        $locale = 'en';
    }

    App::setLocale($locale);

    Route::get('/', function () {
        return redirect(App::getLocale() . '/homepage');
    });

    Route::get('/homepage', [IndexController::class, 'index']);

});


Route::get('/homepage', [IndexController::class, 'index']);
Route::get('/homepage/search', [IndexController::class, 'table'])->name('search');

Route::get('/classic-algorithms/atbash', [ClassicAlgController::class, 'atbash']);
Route::get('/classic-algorithms/caesar', [ClassicAlgController::class, 'caesar']);
Route::get('/classic-algorithms/vigenere', [ClassicAlgController::class, 'vigenere']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('{lngCode}/{cipherType}/{cipher}', [StaticPageController::class, 'index']);
Route::get('{lngCode}/{cipherType}/{cipher}/test', [StaticPageController::class, 'logicPage']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

