<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bl;
use App\Models\order;
use App\Models\parcel;
use App\Models\category;
use App\Models\priceList;
use App\Models\staff;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;


class CBLController extends Controller
{
    protected function index() {
      
        
        return view('bl.new');
    }
}