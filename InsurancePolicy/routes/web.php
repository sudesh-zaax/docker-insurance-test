<?php

use Illuminate\Support\Facades\Route;
Route::prefix('policy')->group(function(){
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/health', function () {
        return response()->json(['status' => 'healthy policy'], 200);
    });
});