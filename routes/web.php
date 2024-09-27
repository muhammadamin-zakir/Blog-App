<?php

use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;


Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');


Route::middleware([CheckAdmin::class])->group(function () {
    Route::get('/blogs/admin_dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');

    Route::get('/blogs/admin_comments', [DashboardController::class, 'adminComments'])->name('admin.comments');
    Route::delete('/blogs/admin_comments/{id}', [DashboardController::class, 'commentDestroy'])->name('comments.destroy');

    Route::get('/blogs/admin_users', [DashboardController::class, 'adminUsers'])->name('admin.users');
    Route::get('/blogs/admin_users/{id}/edit', [DashboardController::class, 'edit'])->name('users.edit');
    Route::put('/blogs/admin_users/{id}', [DashboardController::class, 'update'])->name('users.update');
    Route::delete('/blogs/admin_users/{id}', [DashboardController::class, 'UserDestroy'])->name('users.destroy');

    Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::get('/blogs/show/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
});


Route::get('/blogs/show/{id}', [BlogController::class, 'show'])->name('blogs.show');
Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');
Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');

// comments
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
