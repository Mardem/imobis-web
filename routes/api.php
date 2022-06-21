<?php

use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\API\ClientDetailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('client-detail', ClientDetailController::class)->only(['store', 'update', 'destroy']);
Route::post('update-stage', [LeadController::class, 'updateStage'])->name('update-stage');
Route::post('add-expense', [LeadController::class, 'addExpense'])->name('add-expense');
