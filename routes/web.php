<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClothesController;
use App\Http\Controllers\JewelryController;
use App\Http\Controllers\MakeupController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('categories', ["categories" => Category::all()]);
})->middleware(['auth', 'verified'])->name('categories');

Route::prefix("categories")->group(function () {
    Route::get("/{category}", [CategoryController::class, "show"])->name("category.show"); // Одежда
    Route::post("/{category}", [ClothesController::class, "store"])->name('clothes.store');
    Route::post('/', [CategoryController::class, 'store'])->name('category.store');
    Route::get("/{category}/edit", [CategoryController::class, 'edit'])->name('category.edit');
    Route::put("/{category}/edit", [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

    Route::get("/{category}/clothes/{clothes}/edit", [ClothesController::class, 'edit'])->name('clothes.edit');
    Route::put("/{category}/clothes/{clothes}/edit", [ClothesController::class, 'update'])->name('clothes.update');

    Route::get("/{category}/makeup", [MakeupController::class, "show"])->name("makeup.show"); // Макияж
    Route::post("/{category}/makeup", [MakeupController::class, "store"])->name('makeup.store');
    Route::get("/{category}/makeup/{makeup}", [MakeupController::class, "edit"])->name('makeup.edit');
    Route::put("/{category}/makeup/{makeup}", [MakeupController::class, "update"])->name('makeup.update');

    Route::get("/{category}/jewelry", [JewelryController::class, "show"])->name("jewelry.show"); // Украшения и прически
    Route::post("/{category}/jewelry", [JewelryController::class, "store"])->name('jewelry.store');
    Route::get("/{category}/jewelry/{jewelry}", [JewelryController::class, "edit"])->name('jewelry.edit');
    Route::put("/{category}/jewelry/{jewelry}", [JewelryController::class, "update"])->name('jewelry.update');
})->middleware(['auth']);


Route::delete("/clothes/{clothes}", [ClothesController::class, 'destroy'])->name('clothes.destroy');
Route::delete('/makeup/{makeup}', [MakeupController::class, 'destroy'])->name('makeup.destroy');
Route::delete('/jewelry/{jewelry}', [JewelryController::class, 'destroy'])->name('jewelry.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
