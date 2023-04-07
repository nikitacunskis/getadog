<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\FileController;
use Inertia\Inertia;
use App\Http\Controllers\SocialController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::middleware(['web'])->group(function () {
        Route::prefix('dashboard')->group(function () {
            Route::resource('categories', CategoryController::class); 
            Route::resource('pets', PetController::class);
            Route::post('pets/upload/{petId}', [PetController::class, 'upload'])->name('pets.upload');
            Route::delete('/pet/deleteimage/{filename}', [PetController::class, 'deleteImage'])->name('files.delete');
        });
    });
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    
});

Route::prefix('api')->group(function() {
    Route::get('/pets/{category}', [PetController::class, 'list']);
});

Route::get('/test-vue', function () {
    return Inertia::render('Test');
});
Route::get('/', function () {
    return Inertia::render('Main');
});
Route::get('/dogs', function () {
    return Inertia::render('Main');
});

Route::get('/files/{filename}', [FileController::class, 'show'])->name('files.show');
