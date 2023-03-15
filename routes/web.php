<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use Inertia\Inertia;

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

Route::get('/', function () {
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
            Route::get('/', function () {
                return Inertia::render('Dashboard');
            })->name('dashboard');

            Route::resource('categories', CategoryController::class);
        });
    });

});

Route::middleware(['auth:sanctum'])->group(function () {

    Route::prefix('api')->group(function () {
        // Routes that require authentication
        Route::get('/categories/list', 'CategoryController@list');
        Route::post('/categories/store', 'CategoryController@store');
        Route::post('/categories/edit', 'CategoryController@store');
        Route::delete('/categories/destroy', 'CategoryController@destroy');
        Route::post('/categories/{id}', 'CategoryController@store');
    });
});