<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bloodrequestController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\recipientController;
use App\Http\Controllers\donorController;
use App\Http\Controllers\otherController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('/bloodrequest',bloodrequestController::class);
    Route::get('/bloodrequests',[otherController::class,'bloodrequestview'])->name('bloodrequest.request');
    Route::get('/mybloodrequest',[otherController::class,'getrequest'])->name('bloodrequest.user');
    Route::get('/requestRecieved',[otherController::class,'requestRecieved'])->name('bloodrequest.requestRecieved');
    Route::get('/approveblooddonation/{id}',[otherController::class,'approveblooddonation'])->name('bloodrequest.approveblooddonation');
    // Route::get('/bloodrequest/{query}',[bloodrequestController::class,'bloodrequestsearch']);
    // Route::post('/bloodrequest',[bloodrequestController::class,'bloodrequest']);
    Route::resource('/users',usersController::class);
    Route::resource('/recipientrequest',recipientController::class);
    Route::resource('/donorrequest',donorController::class);
    // Route::resource('/contactus',[contactusController::class]);
    // Route::resource('/donatedblood',[donatedbloodController::class]);
    // Route::resource('/userinfo',[userinfoController::class]);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/searchblood', [bloodrequestController::class, 'search'])->name('donorrequest.search');
    Route::get('/sendRequest/{id?}/{bloodtype?}', [bloodrequestController::class, 'sendRequest'])->name('bloodrequest.sendRequest');
});

require __DIR__.'/auth.php';
