<?php

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

Route::prefix('users')->group(function () {
    Route::get('/',[Usercontroller::class, 'index']);
    Route::get('/create',[Usercontroller::class, 'create']);
    Route::post('/create',[Usercontroller::class, 'create']);
    Route::get('/edit/{user}',[Usercontroller::class, 'edit']);
    Route::put('/edit/{user}',[Usercontroller::class, 'edit']);
    Route::delete('/edit/{user}',[Usercontroller::class, 'destroy']);

});

require __DIR__.'/auth.php';

