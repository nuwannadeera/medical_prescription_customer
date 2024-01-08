<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManagerController;
use App\Http\Controllers\AddPrescriptionController;
use App\Http\Controllers\PrescriptionSummaryController;
use App\Http\Controllers\AddQuotationController;

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

//--------------------------------------login register routes
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


//--------------------------------------add prescription routes

Route::get('/prescription', [AddPrescriptionController::class, 'prescription'])
    ->name('prescription');

Route::post('/add_prescription', [AddPrescriptionController::class, 'savePrescription'])
    ->name('savePrescription');


//--------------------------------------prescription summary routes
Route::get('/prescriptionSummary', [PrescriptionSummaryController::class, 'viewPrescriptionSummary'])
    ->name('viewPrescriptionSummary');

Route::get('/prescriptionSummary',
    [PrescriptionSummaryController::class, 'getAllPrescriptions'])
    ->name('getAllPrescriptions');


//--------------------------------------Quotation routes

Route::post('/addQuotation/{prescription_id}', [AddQuotationController::class, 'goToQuotation'])
    ->name('goToQuotation');

//Route::post('/addQuotation/{prescription_id}', [AddQuotationController::class, 'addQuotation'])
//    ->name('addQuotation');

Route::post('/addQuotation', [AddQuotationController::class, 'addNewQuotation'])
    ->name('addNewQuotation');

Route::get('/addQuotation/{prescription_id}', [AddQuotationController::class, 'viewQuotation'])
    ->name('viewQuotation');


//--------------------------------------Drug routes

Route::post('/addDrug', [AddQuotationController::class, 'addDrug'])
    ->name('addDrug');

Route::get('/edit_drug/{drug}', [AddQuotationController::class, 'editDrug'])
    ->name('editDrug');

Route::post('/edit_drug/{drug}', [AddQuotationController::class, 'updateDrug'])
    ->name('updateDrug');

Route::get('/delete_drug/{drug}', [AddQuotationController::class, 'deleteDrug'])
    ->name('deleteDrug');

Route::get('/clear_drug', [AddQuotationController::class, 'clearDrug'])
    ->name('clearDrug');
