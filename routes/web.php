<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Livewire\Admin\AdminAlumniComponent;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::middleware('admin')->prefix('admin')->group(function() {
    Route::get('/dashboard', AdminAlumniComponent::class);
    // Route::get('/admin/dashboard', function(){
    //     return view("admin.dashboard");
    // });

    Route::post("/logout", [AdminAuthController::class, "destroy"])
                ->name('admin.logout');

});
