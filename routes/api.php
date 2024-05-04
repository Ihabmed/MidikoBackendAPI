<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\PatientController;
use App\Http\Controllers\Api\V1\PatientSessionController;
use App\Models\Patient;
use App\Models\Clinique;
use App\Models\Pharmacie;

Route::prefix("v1")->group(function(){
    Route::apiResource("patients/register", PatientController::class);
    Route::post("patients/login", PatientSessionController::class);
    Route::post("patients/{id}/reservations", function(Patient $patient){
        return $patient->reservation();
    });
    Route::post("patients/{id}/cliniques", function(){
        return Clinique::all();
    });
    Route::post("patients/{id}/pharmacies", function(){
        return Pharmacie::all();
    });
});
    
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
