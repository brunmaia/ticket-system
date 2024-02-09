<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;

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
    return redirect()->route('home');
});
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/add-user', [UserController::class, 'addUser'])->name('addUser');
Route::post('/create-user', [UserController::class, 'createUser'])->name('createUser');
Route::get('/all-user', [UserController::class, 'allUsers'])->name('allUsers');
Route::get('/delete-user/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');
Route::get('/view-user/{id}', [UserController::class, 'viewUser'])->name('viewUser');
Route::post('/update-user', [UserController::class, 'updateUser'])->name('updateUser');
Route::get('/all-tickets', [TicketController::class, 'allTickets'])->name('allTickets');
Route::post('/create-ticket', [TicketController::class, 'createTicket'])->name('createTicket');
Route::get('/add-ticket', [TicketController::class, 'addTicket'])->name('addTicket');
Route::get('/view-ticket/{id}', [TicketController::class, 'viewTicket'])->name('viewTicket');
Route::post('/update-ticket', [TicketController::class, 'updateTicket'])->name('updateTicket');
Route::post('/update-status', [TicketController::class, 'updateStatus'])->name('updateStatus');
