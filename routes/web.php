<?php

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Web\AuthController;
use Illuminate\Support\Facades\Hash;
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
    return view('login_form');
})->name('login_form');

Route::post('login', [AuthController::class, 'userLogin'])->name('user.login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('users', [UserController::class, 'users'])->name('users');
Route::get('delete/{id}', [UserController::class, 'delete'])->name('delete');
Route::get('user-detail/{id}', [UserController::class, 'userDetail'])->name('user.detail');
// Route::get('create-user', [UserController::class, 'create'])->name('create');

Route::get('test', function(){
   dd(Hash::make('password'));
});
