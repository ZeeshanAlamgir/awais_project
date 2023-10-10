<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\PreRegistration\HugsIncRegistrationController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::controller(HugsIncRegistrationController::class)->group( function () {
    Route::post('pre-registration', 'store');
    Route::put('update-registration/{id}', 'update');
    Route::get('delete', 'delete');
    Route::get('show', 'show');
    Route::get('registrations', 'showAll');
})->middleware('cors', 'auth:sanctum');

Route::controller(UserController::class)->group( function () {
    Route::get('users-list', 'index');
} )->middleware('auth:sanctum');

Route::controller(AuthController::class)->group( function () {
    Route::get('login', 'login');
} );

Route::controller(ContactUsController::class)->group( function () {
    Route::get('store', 'store');
} )->middleware('auth:sanctum');;
