<?php

use App\Http\Controllers\FrontendCrudController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/', [HomepageController::class, 'index'])->name('index');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/causes', [PageController::class, 'causes'])->name('causes');
Route::get('/causes/{id}', [PageController::class, 'singleCauses'])->name('singleCauses');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/donators', [PageController::class, 'donators'])->name('donators');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');

Route::get('/volunteer', [PageController::class, 'volunteer'])->name('volunteer.register');
Route::post('/volunteer-store', [FrontendCrudController::class, 'volunteerStore'])->name('volunteerStore');
Route::post('/donation-store', [FrontendCrudController::class, 'donationStore'])->name('donationStore');


Route::post('/contact-message', [FrontendCrudController::class, 'contactMessage'])->name('contactMessage');
