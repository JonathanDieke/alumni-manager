<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Livewire\Admin\AdminAlumniComponent;
use App\Http\Livewire\Admin\AdminAlumnusDetailsComponent;
use App\Http\Livewire\Admin\AdminOffersComponent;
use App\Http\Livewire\Alumni\AlumniAlumnusDetails;
use App\Http\Livewire\Alumni\AlumniOffersComponent;
use App\Http\Livewire\Alumni\AlumniProfile;
use App\Http\Livewire\Alumni\AlumniQna;
use App\Http\Livewire\Alumni\AlumniShowQna;
use App\Http\Livewire\Alumni\ProfessionalDirectoryComponent;

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

require __DIR__.'/auth.php';

Route::middleware(['auth'])->prefix('alumni')->name('alumni.')->group(function() {

    Route::get('/professional-directory', ProfessionalDirectoryComponent::class)
            ->name("professional-directory");

    Route::get('/professional-directory/show/{user}', AlumniAlumnusDetails::class)
            ->name('alumnus.details');

    Route::get('/offers/{user?}',  AlumniOffersComponent::class)
            ->name('offers');


    Route::get('/{user}/offers/show',  AlumniOffersComponent::class)
    ->name('my-offers');

    Route::get('/qna',  AlumniQna::class)
            ->name('qna');

    Route::get('/qna/show/{question}',  AlumniShowQna::class)
            ->name('qna.show');

    Route::get('/profile/{user}',  AlumniProfile::class)
            ->name('profile');
});

Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function() {
    Route::get('/dashboard', AdminAlumniComponent::class)->name('dashboard');

    Route::get('/show/users/{user}', AdminAlumnusDetailsComponent::class)->name('alumnus.details');

    Route::get('/offers',  AdminOffersComponent::class)->name('offers');

    Route::post("/logout", [AdminAuthController::class, "destroy"])
                ->name('logout');

});
