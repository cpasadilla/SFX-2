<?php

namespace App\Http\Controllers;

use App\Models\staff;
use App\Models\User;
use App\Models\priceList;
use App\Models\category;
use App\Models\order;
use App\Models\parcel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BLControllers extends Controller {
    public function index() {
        $users = staff::paginate();

        return view('bl.home', compact('users'));
    }

    protected function order($key) {
        $products = priceList::paginate(12);
        $cats = category::all();

        return view('bl.create', compact('users','products','cats'));
    }
}