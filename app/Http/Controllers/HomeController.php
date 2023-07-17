<?php

namespace App\Http\Controllers;
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
        $id = User::where('isStaff', '0')->get();
        $id = count($id);
        $staff = count(User::where('isStaff', '1')->get());
        $prog = count(order::where('status','inProgress')->get());
        $comp = count(order::where('status','complete')->get());
        return view('home', compact('id','prog','staff','comp'));
    }
}
