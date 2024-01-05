<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SubjectsController;
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
    // check if user is logged in
    if (Auth::check()) {
        // check if user is admin
        return redirect()->route('dashboard');
    }
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/grades/my/{id}', [GradesController::class, 'user'])->name('grades.user');

Route::middleware('checkPermission:administrator')->group(function () {
    Route::get('/admin', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/edit/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/edit/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
});

Route::middleware('checkPermission:nauczyciel')->group(function () {
    Route::get('/subjects', [SubjectsController::class, 'index'])->name('subjects.index');
    Route::get('/subjects/create', [SubjectsController::class, 'create'])->name('subjects.create');
    Route::post('/subjects', [SubjectsController::class, 'store'])->name('subjects.store');
    Route::get('/subjects/{subject}', [SubjectsController::class, 'show'])->name('subjects.show');
    Route::get('/subjects/{subject}/edit', [SubjectsController::class, 'edit'])->name('subjects.edit');
    Route::put('/subjects/{subject}', [SubjectsController::class, 'update'])->name('subjects.update');
    Route::delete('/subjects/{subject}', [SubjectsController::class, 'destroy'])->name('subjects.destroy');
    
    Route::get('/grades', [GradesController::class, 'index'])->name('grades.index');
    Route::get('/grades/create', [GradesController::class, 'create'])->name('grades.create');
    Route::post('/grades', [GradesController::class, 'store'])->name('grades.store');
    Route::get('/grades/{grade}', [GradesController::class, 'show'])->name('grades.show');
    Route::get('/grades/{grade}/edit', [GradesController::class, 'edit'])->name('grades.edit');
    Route::put('/grades/{grade}', [GradesController::class, 'update'])->name('grades.update');
    Route::delete('/grades/{grade}', [GradesController::class, 'destroy'])->name('grades.destroy');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
