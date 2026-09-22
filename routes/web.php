<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\EducationController as AdminEducationController;
use App\Http\Controllers\Admin\ExperienceController as AdminExperienceController;
use App\Http\Controllers\Admin\AchievementController as AdminAchievementController;
use App\Http\Controllers\Admin\SkillController as AdminSkillController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\ProjectController;

// Public pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Admin - simple auth
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Admin protected routes
Route::middleware('admin.auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard');

    Route::resource('projects', AdminProjectController::class);
    Route::resource('education', AdminEducationController::class)->except(['show']);
    Route::resource('experience', AdminExperienceController::class)->except(['show']);
    Route::resource('achievements', AdminAchievementController::class)->except(['show']);
    Route::resource('skills', AdminSkillController::class)->except(['show']);

    Route::get('profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile', [AdminProfileController::class, 'update'])->name('profile.update');

    Route::get('messages', [AuthController::class, 'messages'])->name('messages');
    Route::post('messages/{id}/read', [AuthController::class, 'markRead'])->name('messages.read');
});
