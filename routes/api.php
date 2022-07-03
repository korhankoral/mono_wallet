<?php

use App\Http\Controllers\Backoffice\PromotionController;
use App\Http\Controllers\PromotionController as UserPromotionController;
use Illuminate\Support\Facades\Route;

Route::prefix('backoffice')->group(function (){
    Route::prefix('promotion-codes')->group(function (){
        Route::get('/', [PromotionController::class, 'index']);
        Route::get('/{id}', [PromotionController::class, 'store']);
        Route::post('/', [PromotionController::class, 'create']);
    });
});

Route::post('assign-promotion', [UserPromotionController::class, 'assignPromotion'])->middleware(['user.login']);
