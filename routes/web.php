<?php

use App\Http\Controllers\LeaveController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Leave;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

// Commun Routes 
Route::get('/dashboard', function (Request $request) {
    $leaves = $request->user()->is_admin ? Leave::all() : $request->user()->leaves;
    return view('dashboard', compact('leaves'));
})->middleware(['auth', 'verified'])->name('dashboard');

/**
 * Admin Routes
*/
Route::middleware(['admin'])->group(function () {
    Route::get('employees', [UserController::class, 'employees'])->name('employees');
    Route::get('employees/{user}', [UserController::class, 'leavesByEmployee'])->name('employees.leaves');
    Route::put('/leaves/{leave}', [LeaveController::class, 'update'])->name('leaves.update');
});

/**
 * Employee Routes
 */
Route::middleware('auth')->group(function () {
    Route::get('/leaves', [LeaveController::class, 'create'])->name('leaves.create');
    Route::post('/leaves', [LeaveController::class, 'store'])->name('leaves.store');
});

/**
 * Profile Routes
 */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
