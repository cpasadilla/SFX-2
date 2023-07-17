<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function store(Request $request)
    {
        // Process the incoming data from NodeMCU
        $temperature = $request->input('temperature');
        $humidity = $request->input('humidity');

        // Store the data in your database or perform any other operations
        // Example: $reading = Reading::create(['temperature' => $temperature, 'humidity' => $humidity]);

        // Return a response if needed
        return response()->json(['message' => 'Data received successfully']);
    }
}