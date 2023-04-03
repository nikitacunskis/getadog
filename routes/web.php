<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\PetController;
=======
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ApiController;
>>>>>>> 8974eb26cd7462531ddf381a4c9089b56051a1f7
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
<<<<<<< HEAD
            Route::resource('categories', CategoryController::class); 
            Route::resource('pets', PetController::class);
            Route::post('pets/upload/{petId}', [PetController::class, 'upload'])->name('pets.upload');
        });
    });
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    
});

Route::prefix('api')->group(function() {
    Route::get('/pets/{category}', [PetController::class, 'list']);
});

=======
            Route::get('/', function () {
                return Inertia::render('Dashboard');
            })->name('dashboard');

            Route::resource('categories', CategoryController::class);
            Route::resource('pets', PetController::class);
        });
    });

});

Route::prefix('api')->group(function () {
    // Routes that require authentication
    Route::get('/categories', [CategoryController::class, 'list']);
});


//Google Authentication Routes
Route::get('auth/google', [SocialController::class, 'googleRedirect']);
Route::get('auth/google/callback', [SocialController::class, 'googleLoginOrRegister']);


>>>>>>> 8974eb26cd7462531ddf381a4c9089b56051a1f7
Route::get('/test-vue', function () {
    return Inertia::render('Test');
});