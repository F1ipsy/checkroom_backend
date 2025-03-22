<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::get("/categories", [ApiController::class, "get_categories"]);

Route::get("/categories/{id}/clothes", [ApiController::class, "get_clothes"]);

Route::get("/categories/{id}/makeup", [ApiController::class, "get_makeup"]);

Route::get("/categories/{id}/jewelry", [ApiController::class, "get_jewelry"]);

Route::get("/categories/{id}", [ApiController::class, "get_category"]);
