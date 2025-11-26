<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Http\Controllers\Classroom\DepartmentController;
use App\Http\Controllers\Classroom\RepositoryController;
use App\Http\Controllers\Classroom\ClassroomController;
use App\Http\Controllers\Classroom\LostFoundController;
use App\Http\Controllers\Classroom\ClassRepositoryController;
use App\Http\Controllers\Classroom\PostController;
use App\Http\Controllers\Admin\ManagerController;
use App\Http\Controllers\Admin\AdvertisementController;
use App\Http\Controllers\Admin\DepartmentController as AdminDepartmentController;
use App\Http\Controllers\Admin\ClassroomController as AdminClassroomController;
use App\Http\Controllers\Admin\RepositoryController as AdminRepositoryController;
use App\Http\Controllers\HomeController;
use App\Models\Advertisement;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::get('dashboard', function () {
    $ads = Advertisement::where('is_active', true)->orderBy('created_at', 'desc')->get();
    return Inertia::render('Dashboard', compact('ads'));
})->middleware(['auth', 'verified'])->name('dashboard');
// Route::resource('dashboard', HomeController::class)->names('dashboard');


Route::resource('departments', DepartmentController::class);
Route::resource('repositories', RepositoryController::class);
Route::resource('classrooms', ClassroomController::class);

Route::resource('files', ClassRepositoryController::class);
// Route::resource('losses', LostFoundController::class);
route::resource('posts', PostController::class);

Route::resource('managers', ManagerController::class);
Route::resource('advertisements', AdvertisementController::class);
Route::resource('admin/departments', AdminDepartmentController::class)->names('admin_departments');
Route::resource('admin/classrooms', AdminClassroomController::class)->names('admin_classrooms');
Route::post('admin/classrooms/cover/{classroom}', [AdminClassroomController::class, 'cover'])->name('admin_classrooms.cover');

Route::resource('admin/repositories', AdminRepositoryController::class)->names('admin_repositories');
Route::post('advertisements/departments', [AdvertisementController::class, 'store_department'])->name('advertisements.store_department');

require __DIR__ . '/settings.php';
