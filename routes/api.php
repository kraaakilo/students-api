<?php

use App\Http\Controllers\StudentController;
use App\Http\Requests\StudentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware("api.auth")->prefix("students")->group(function () {
    Route::get("/", [StudentController::class, "index"]);
    Route::post("/", [StudentController::class, "store"]);
    Route::get("/{student}", [StudentController::class, "show"]);
});
