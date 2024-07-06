<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::resource('user-data', UserDataController::class);
    Route::resource('students', StudentController::class);
    // Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
    // Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
    // Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
    
    // Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');

});



?>

