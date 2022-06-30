<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/articles', [ArticleController::class, 'index'])->name('article.index');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::post('/articles/store', [ArticleController::class, 'store'])->name('article.store');
Route::post('/articles/{article}', [ArticleController::class, 'update'])->name('article.update');
Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('article.delete');

Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('category.store');
Route::post('/categories/{category}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('category.delete');