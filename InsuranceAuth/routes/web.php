<?php

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function(){
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/health', function () {
        return response()->json(['status' => 'healthy auth'], 200);
    });
});