<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Http\Controllers\Classroom\DepartmentController;
use App\Http\Controllers\Classroom\RepositoryController;
use App\Http\Controllers\Classroom\ClassroomController;
use App\Http\Controllers\Classroom\LostFoundController;
use App\Http\Controllers\Classroom\ClassRepositoryController;
use App\Http\Controllers\Admin\AdminController;

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

Route::resource('files', ClassRepositoryController::class);

Route::resource('losses', LostFoundController::class);

Route::resource('managers', AdminController::class);

require __DIR__ . '/settings.php';
