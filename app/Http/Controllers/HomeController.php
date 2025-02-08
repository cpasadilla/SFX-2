<?php

namespace App\Http\Controllers;

use App\Models\CustomerID;
use App\Models\User;
use App\Models\order;
use Illuminate\Http\Request;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index() {
        $id = User::paginate();
        $id = count($id);
        $staff = count(CustomerID::paginate(1000));
        $prog = count(order::where('bl_status','PAID')->get());
        $comp = count(order::where('bl_status','UNPAID')->get());


       // Count orders with orderId starting with 'BL1-' and 'BL2-' 
        $progt = Order::where('orderId', 'like', 'BL1-%')->count();
        $compt = Order::where('orderId', 'like', 'BL2-%')->count();
        $idt = Order::where('orderId', 'like', 'BL3-%')->count();
        $stafft = Order::where('orderId', 'like', 'BL4-%')->count();

        return view('home', compact('id','prog','staff','progt','comp','compt','stafft','idt'));
    }
}
//<!-- CONTROLLER FOR DASHBOARD-->