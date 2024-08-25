<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\TensimeterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::post('/login/post', [LoginController::class, 'handleLogin'])->name('login.post');

Route::group(['prefix' => 'master', 'middleware' => ['auth:web,web_patient', 'verified']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/operator', [OperatorController::class, 'index'])->name('operator.index');
    Route::get('/operator/create', [OperatorController::class, 'create'])->name('operator.create');
    Route::post('/operator/store', [OperatorController::class, 'store'])->name('operator.store');
    Route::get('/operator/{id}/edit', [OperatorController::class, 'edit'])->name('operator.edit');
    Route::put('/operator/update/{id}', [OperatorController::class, 'update'])->name('operator.update');
    Route::delete('/operator/{id}/destroy', [OperatorController::class, 'destroy'])->name('operator.destroy');
    Route::get('/operator/ajax', [OperatorController::class, 'ajax'])->name('operator.ajax');

    Route::name('patient.')->prefix('student')->group(function () {
        Route::get('/', [PatientController::class, 'index'])->name('index');
        Route::get('/create', [PatientController::class, 'create'])->name('create');
        Route::post('/store', [PatientController::class, 'store'])->name('store');
        Route::delete('/{id}/destroy', [PatientController::class, 'destroy'])->name('destroy');
        Route::get('/ajax', [PatientController::class, 'ajax'])->name('ajax');
        Route::get('/{id}/tensimeter', [TensimeterController::class, 'index'])->name('tensimeter.index');
        Route::get('/{id}/tensimeter/ajax', [TensimeterController::class, 'ajax'])->name('tensimeter.ajax');
    });
});
