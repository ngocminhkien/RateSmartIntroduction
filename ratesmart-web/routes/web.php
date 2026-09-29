<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AvmController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\LeadController;

/*
|--------------------------------------------------------------------------
| Web Routes - RateSmart Application
|--------------------------------------------------------------------------
*/

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tra-cuu-avm', [AvmController::class, 'index'])->name('avm.index');
Route::post('/api/avm/calculate', [AvmController::class, 'calculate'])->name('api.avm.calculate');
Route::post('/lien-he', [ContactController::class, 'submit'])->name('contact.submit');

// Admin CMS Control Panel Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('properties', PropertyController::class);
    Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');
    Route::patch('/leads/{lead}/status', [LeadController::class, 'updateStatus'])->name('leads.status');
});
