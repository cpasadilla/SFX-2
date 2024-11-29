<?php

namespace App\Http\Controllers;

use App\Models\CustomerID;
use App\Models\User;
use App\Models\order;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = User::paginate();
        $id = count($id);
        $staff = count(CustomerID::paginate());
        $prog = count(order::where('status','inProgress')->get());
        $comp = count(order::where('status','CHARTERED')->get());
        return view('home', compact('id','prog','staff','comp'));
    }
}
