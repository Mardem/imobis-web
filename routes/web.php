<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Enterprise\EnterpriseController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Client\ClientsController;
use App\Http\Controllers\TestController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.home');
    Route::resource('enterprise', EnterpriseController::class);
    Route::resource('clients', ClientsController::class);
    Route::resource('leads', LeadController::class);
});
Route::resource('test', TestController::class);
