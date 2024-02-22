<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormsApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('users', [FormsApiController::class, 'users']);
Route::get('forms', [FormsApiController::class, 'forms']);
Route::get('questions', [FormsApiController::class, 'questions']);
Route::get('response', [FormsApiController::class, 'response']);
Route::post('response', [FormsApiController::class, 'responseStore']);
Route::get('questions-response', [FormsApiController::class, 'questionResponse']);

