<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GradesController;

use App\Http\Controllers\StudentsController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
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

Route::get('/students', [StudentsController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentsController::class, 'create'])->name('students.create');
Route::post('/students', [StudentsController::class, 'store'])->name('students.store');
Route::get('/students/{student}', [StudentsController::class, 'show'])->name('students.show');
Route::get('/students/{student}/edit', [StudentsController::class, 'edit'])->name('students.edit');
Route::put('/students/{student}', [StudentsController::class, 'update'])->name('students.update');
Route::delete('/students/{student}', [StudentsController::class, 'destroy'])->name('students.destroy');


// Route::get('/students', 'StudentsController@index');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
