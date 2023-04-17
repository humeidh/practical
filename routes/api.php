<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AddressController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//api routes related to patient 
Route::get('/patients',[PatientController::class, 'index']); //done, api works
Route::post('/patients', [PatientController::class, 'store'])->name('storepatient'); //done, api works
Route::put('/patients/{patient}',[PatientController::class, 'update']);// done tested
Route::delete('/patients/{patient}',[PatientController::class, 'destroy']);
Route::put('/patientstatus/{patient}', [PatientController::class, 'statusupdate']);

//api routes related to address
Route::get('/addresses', [AddressController::class, 'index']);//done api works checked
Route::post('/addresses',[AddressController::class, 'store']);//done 
Route::put('/address/{address}',[AddressController::Class, 'update']);//done
Route::delete('/address/{address}', [AddressController::class, 'destroy']);