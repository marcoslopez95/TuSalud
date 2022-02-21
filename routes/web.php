<?php

use App\Http\Controllers\Rol\RolController;
use App\Http\Controllers\User\Usercontroller;
use App\Models\Rol;
use Carbon\Carbon;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
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

/* Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
}); */

Route::get('/', function () {
    return Inertia::render('Bienvenida', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'now' => Carbon::now()->format('Y')
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::prefix('users')->group(function () {
        Route::name('users-')->group(function () {
            Route::get('/',[Usercontroller::class, 'index'])->name('index');
            Route::get('/create',[Usercontroller::class, 'create'])->name('create');
            Route::post('/create',[Usercontroller::class, 'store'])->name('store');
            Route::get('/edit/{user}',[Usercontroller::class, 'edit'])->name('edit');
            Route::put('/edit/{user}',[Usercontroller::class, 'update'])->name('update');
            Route::get('/{user}',[Usercontroller::class, 'show'])->name('show');
            Route::delete('/edit/{user}',[Usercontroller::class, 'destroy'])->name('destroy');
        });
    });
    
    Route::prefix('roles')->group(function () {
        Route::name('roles-')->group(function(){
            Route::get('/',[RolController::class, 'index'])->name('index');
            Route::get('/create',[RolController::class, 'create'])->name('create');
            Route::post('/create',[RolController::class, 'store'])->name('store');
            Route::get('/edit/{rol}',[RolController::class, 'edit'])->name('edit');
            Route::put('/edit/{rol}',[RolController::class, 'update'])->name('update');
            Route::get('/{rol}',[RolController::class, 'show'])->name('show');
            Route::delete('/edit/{rol}',[RolController::class, 'destroy'])->name('destroy');
        });
    });

});

require __DIR__.'/auth.php';

