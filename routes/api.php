<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;


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
Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/get-users', [UserController::class, 'getUsers']);
    Route::post('/add-user', [UserController::class, 'addUser']);
    Route::put('/edit-user/{id}', [UserController::class, 'editUser']);
    Route::delete('/delete-user/{id}', [UserController::class, 'deleteUser']);

    //residents CRUD
     Route::get('/get-residents', [ResidentController::class, 'getResident']);
    Route::post('/add-resident', [ResidentController::class, 'addResident']);
    Route::put('/edit-resident/{id}', [ResidentController::class, 'editResident']);
    Route::delete('/delete-resident/{id}', [ResidentController::class, 'deleteResident']);

    //Reservation CRUD
    Route::get('/get-reservation', [ReservationController::class, 'getReservation']);
    Route::post('/add-reservation', [ReservationController::class, 'addReservation']);
    Route::put('/edit-reservation/{id}', [ReservationController::class, 'editReservation']);
    Route::delete('/delete-reservation/{id}', [ReservationController::class, 'deleteReservation']);

    
    Route::post('/logout', [AuthenticationController::class, 'logout']);

});