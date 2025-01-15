<?php

use Illuminate\Support\Facades\Route;

Route::prefix('product')->group(function(){
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/health', function () {
        return response()->json(['status' => 'healthy product'], 200);
    });
});