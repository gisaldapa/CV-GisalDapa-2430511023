<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PersonalInfoController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\ExperiencePhotoController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\CertificatePhotoController;
use App\Http\Controllers\Admin\HobbyController;
use App\Http\Controllers\Admin\ContactInfoController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
Route::get('/education', [HomeController::class, 'education'])->name('education');
Route::get('/skills', [HomeController::class, 'skills'])->name('skills');
Route::get('/experience', [HomeController::class, 'experience'])->name('experience');
Route::get('/certificates', [HomeController::class, 'certificates'])->name('certificates');
Route::get('/hobbies', [HomeController::class, 'hobbies'])->name('hobbies');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

/*
|--------------------------------------------------------------------------
| Admin Auth Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

    /*
    |----------------------------------------------------------------------
    | Admin Protected Routes
    |----------------------------------------------------------------------
    */
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Personal Information
        Route::get('/personal', [PersonalInfoController::class, 'edit'])->name('personal.edit');
        Route::put('/personal', [PersonalInfoController::class, 'update'])->name('personal.update');
        Route::delete('/personal/photo', [PersonalInfoController::class, 'deletePhoto'])->name('personal.photo.delete');

        // Educations
        Route::resource('educations', EducationController::class)->except(['show']);

        // Skills
        Route::resource('skills', SkillController::class)->except(['show']);

        // Experiences
        Route::resource('experiences', ExperienceController::class)->except(['show']);

        // Experience Photos
        Route::resource('experience-photos', ExperiencePhotoController::class)->except(['show']);

        // Certificates
        Route::resource('certificates', CertificateController::class)->except(['show']);

        // Certificate Photos
        Route::resource('certificate-photos', CertificatePhotoController::class)->except(['show']);

        // Hobbies
        Route::resource('hobbies', HobbyController::class)->except(['show']);

        // Contact Information
        Route::get('/contacts', [ContactInfoController::class, 'edit'])->name('contacts.edit');
        Route::put('/contacts', [ContactInfoController::class, 'update'])->name('contacts.update');

        // Change Password
        Route::get('/change-password', function () {
            return view('admin.change-password');
        })->name('change-password');
        Route::post('/change-password', function (\Illuminate\Http\Request $request) {
            $request->validate([
                'current_password' => 'required',
                'password'         => 'required|min:8|confirmed',
            ]);
            $user = auth()->user();
            if (!\Illuminate\Support\Facades\Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Current password is incorrect.']);
            }
            $user->update(['password' => \Illuminate\Support\Facades\Hash::make($request->password)]);
            return back()->with('success', 'Password changed successfully!');
        })->name('change-password.update');
    });
});
