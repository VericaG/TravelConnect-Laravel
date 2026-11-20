
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PlanController;

Route::get('/plans', [PlanController::class, 'index']);
Route::post('/plans', [PlanController::class, 'store']);
Route::get('/plans/{id}', [PlanController::class, 'show']);
Route::patch('/plans/{id}', [PlanController::class, 'update']);
Route::delete('/plans/{id}', [PlanController::class, 'destroy']);
