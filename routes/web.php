<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManagerController;

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


Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/login', [AuthManagerController::class, 'login'])->name('login');

Route::post('/login', [AuthManagerController::class, 'loginPost'])->name('login.post');

Route::get('/registration', [AuthManagerController::class, 'registration'])->name('registration');

Route::post('/registration', [AuthManagerController::class, 'registrationPost'])->name('registrationPost');

Route::get('/logout', [AuthManagerController::class, 'logout'])->name('logout');

Route::get('/dashboard', [AuthManagerController::class, 'goToDashboard'])->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', function () {
        return "Hi...";
    });
});
