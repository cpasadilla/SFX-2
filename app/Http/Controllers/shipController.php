<?php

namespace App\Http\Controllers;

use App\Models\ship;
use Illuminate\Http\Request;

class shipController extends Controller
{
    protected function create (Request $request){
        ship::create([
            'number' => $request->ship,
            'status'=> "IN USE"
        ]);
        return redirect()->route('p.view');

    }
}
