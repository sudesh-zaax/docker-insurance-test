<?php

use Illuminate\Support\Facades\Route;
Route::prefix('policy')->group(function(){
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/health', function () {
        return response()->json(['status' => 'healthy policy'], 200);
    });
    Route::get('/checkpolicyservise', function (Request $request) {
        return response()->json([
            'status' => 'sucess',
            'message' => 'welcome to unione plicy'
        ],200);
    });
});