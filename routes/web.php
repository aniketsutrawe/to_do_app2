<?php

use App\Http\Controllers\DatabaseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutesController;

Route::get('/', [RoutesController::class,'home']);

Route::get('/', [DatabaseController::class,'index']);

Route::get('/delete/{id}', [DatabaseController::class,'delete']);

Route::get('/permanentDelete/{id}', [DatabaseController::class,'permanentDelete']);

Route::get('/restore/{id}', [DatabaseController::class,'restore']);

Route::get('/edit/{id}', [DatabaseController::class,'edit']);

Route::post('/update/{id}', [DatabaseController::class,'update']);

Route::get('/addtask', [RoutesController::class,'addtask']);

Route::post('/addtask', [DatabaseController::class,'store']);

Route::get('/compleatedTasks', [RoutesController::class,'compleatedTasks']);

Route::get('/tasks', [DatabaseController::class,'addtasks']);

Route::get('/search', [DatabaseController::class,'search']);
