<?php

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
    return to_route('filament.pages.dashboard');
})->name('filament.auth.login');

Route::middleware([
    'auth:sanctum',
    config('filament-companies.auth_session'),
    'verified',
])->group(function () {
});


if (!app()->environment('production') || !app()->runningUnitTests()) {
    Route::get('superadmin', function () {
        auth()->user()->assignRole('super_admin');
        return redirect()->back();
    });
}
