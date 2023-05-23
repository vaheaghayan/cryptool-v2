<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaticPageController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\AlgorithmInnerPageController;

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

Route::prefix('/{locale}/')->group(function () {
    $locale = request()->segment(1);
    if (!in_array($locale, ['en', 'am'])) {
        $locale = 'en';
    }

    App::setLocale($locale);

    Route::middleware('guest')->group(function () {
        Route::get('/user/sign-up', [RegisterController::class, 'registerForm']);
        Route::post('/user/sign-up', [RegisterController::class, 'register']);
        Route::get('/user/sign-up/success', [RegisterController::class, 'registerSuccess']);
        Route::get('/user/sign-up/complete/{token}', [VerificationController::class, 'verify']);
        Route::get('/user/sign-in', [LoginController::class, 'loginForm']);
        Route::post('/user/sign-in', [LoginController::class, 'login']);

        Route::get('/user/forgot-password', [ForgotPasswordController::class, 'forgotPasswordForm']);
        Route::post('/user/forgot-password', [ForgotPasswordController::class, 'forgotPassword']);
        Route::get('/user/forgot-password/success', [ForgotPasswordController::class, 'forgotPasswordSuccess']);

        Route::get('/user/password-reset/complete/{token}', [PasswordResetController::class, 'passwordResetForm']);
        Route::post('/user/password-reset/', [PasswordResetController::class, 'passwordReset']);
        Route::get('/user/password-reset/success', [PasswordResetController::class, 'passwordResetSuccess']);
    });

    Route::middleware('auth')->group(function () {
        Route::post('/user/logout', [LoginController::class, 'logout']);

        Route::get('/user/profile', [ProfileController::class, 'profileForm']);

        Route::post('/user/profile/save', [ProfileController::class, 'save']);
    });
});


Route::get('/', function () {
    return redirect('en/homepage');
});

Route::prefix('/{locale}/')->group(function () {
    $locale = request()->segment(1);
    if (!in_array($locale, ['en', 'am'])) {
        $locale = 'en';
    }

    App::setLocale($locale);

    Route::get('/', function () {
        return redirect(App::getLocale() . '/homepage');
    });

    Route::get('/homepage', [IndexController::class, 'index']);

    Route::get('/forum/conversation/{id}', [ConversationController::class, 'index']);
    Route::get('/forum', [ForumController::class, 'index']);

    Route::get('/{cipherCategory}/inner', [AlgorithmInnerPageController::class, 'index']);

    Route::get('/{cipherType}/{cipher}', [StaticPageController::class, 'index']);
    Route::middleware('auth')->group(function () {
        Route::get('/{cipherType}/{cipher}/test', [StaticPageController::class, 'logicPage']);
    });
});

Route::get('/homepage', [IndexController::class, 'index']);
Route::get('/homepage/search', [IndexController::class, 'table'])->name('search');






