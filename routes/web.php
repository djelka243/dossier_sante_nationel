<?php

use App\Http\Controllers\HopitalController;
use App\Http\Controllers\MedecinController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('auth.login');
});

Route::get('/authentification', [UserController::class, 'login'])->name('authentification');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('/dashboard', [UserController::class, 'home'])->name('dashboard');
    Route::get('/patients', [UserController::class, 'patient'])->name('patients');
    Route::get('/medecins', [MedecinController::class, 'viewMedecin'])->name('medecins');
    Route::get('/add-medecins', [MedecinController::class, 'addMedecin'])->name('addMedecins');
    Route::delete('/del-medecins', [MedecinController::class, 'delMedecin'])->name('delMedecins');
    Route::get('/hopitaux', [HopitalController::class, 'viewHopital'])->name('hopitaux');
    Route::post('/add-hospital', [HopitalController::class, 'addHopital'])->name('addHopital');
    Route::delete('/del-hospital', [HopitalController::class, 'delHopital'])->name('delHopital');
    Route::get('/lier-patient-a-hopital', [HopitalController::class, 'LinkPatientToHosto'])->name('link.patienthosto');
    Route::get('/lier-patient-au-medecin', [HopitalController::class, 'LinkPatientToMededin'])->name('link.patientmed');

});

Route::get('/authentification', [MedecinController::class, 'auth'])->name('medecin.auth');

Route::middleware(['medecin'])->group(function(){
    Route::get('/accueil', [MedecinController::class, 'medHome'])->name('medecin.home');
    Route::get('/mes-patients', [MedecinController::class, 'medPatient'])->name('medecin.patient');
    Route::get('/deconnexion', [MedecinController::class, 'medLogout'])->name('medecin.logout');

});
