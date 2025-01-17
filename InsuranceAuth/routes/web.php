<?php

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function(){
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/health', function () {
        return response()->json(['status' => 'healthy auth'], 200);
    });
    Route::get('/checkfromauth', function (Request $request) {

     
        $response = Http::get(env('SERVICE_URL').'/policy/checkpolicyservise');
        
        // Handle the response
        
        if ($response->successful()) {
            // Get the response data as an array
            $data = $response->json();  // This returns the response as an array
        
            // You can also access individual data like:
            // $data['key_name'];  // Access specific data if needed
        
            return response()->json($data);  // Return the data in your own response
        } else {
            // If the request fails, return error details
            return response()->json([
                'error' => 'Unable to connect to the policy service',
                'details' => $response->body()  // Raw body if needed
            ], $response->status());
        }
        
    });
});
