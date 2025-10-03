<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

// Public: read-only list and detail
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');

// Admin area
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/admin/students', [StudentController::class, 'store'])->name('students.store');
    Route::get('/admin/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/admin/students/{student}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/admin/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
});
