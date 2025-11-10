<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Http\Controllers\Classroom\DepartmentController;
use App\Http\Controllers\Classroom\RepositoryController;
use App\Http\Controllers\Classroom\ClassroomController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('departments', DepartmentController::class);
Route::resource('repositories', RepositoryController::class);
Route::resource('classrooms', ClassroomController::class);

require __DIR__ . '/settings.php';
