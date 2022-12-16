<?php

use App\Http\Controllers\AllinputController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UpozilaController;
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

Route::get('/', function () {
    return view('welcome');
});

// applicant
Route::get('applicant/create', [ApplicantController::class, 'create'])-> name('applicant.create');
Route::post('applicant', [ApplicantController::class, 'store'])->name('applicant.store');

Route::get('get-districts/{id}', [ApplicantController::class, 'getDistricts']);
Route::get('get-upozilas/{id}', [ApplicantController::class, 'getUpozilas']);

// education qualification json value post on database
Route::post('education-qualification', [ApplicantController::class, 'education']);



Route::middleware(['auth'])->group(function () {

    //dashboard
    Route::get('dashboard', [DashboardController::class, 'index']);

    //division
    Route::resource("/division", DivisionController::class);

    // district
    Route::resource("/district", DistrictController::class);

    // upozila
    Route::resource("/upozila", UpozilaController::class);

    // applicant
    Route::get('applicant', [ApplicantController::class, 'index'])->name('applicant.index');
    Route::get('applicant/{id}', [ApplicantController::class, 'show'])->name('applicant.show');
    Route::get('applicant/{applicant}/edit', [ApplicantController::class, 'edit'])->name('applicant.edit');
    Route::put('applicant/{applicant}', [ApplicantController::class, 'update'])->name('applicant.update');
    Route::delete('applicant/{applicant}', [ApplicantController::class, 'destroy'])-> name('applicant.destroy');

});

require __DIR__.'/auth.php';
