<?php

use App\Http\Controllers\ActivityController;
use App\Http\Livewire\ActivityComponent;
use App\Http\Livewire\AdminDashboard;
use Illuminate\Notifications\Action;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware(['auth:sanctum','verified'])->group(function(){
Route::get('/activites', ActivityComponent::class)->name('activites');
});

Route::middleware(['auth:sanctum','verified','isAdmin'])->group(function(){

    Route::get('/admin/dashboard', AdminDashboard::class)->name('admin');

});
