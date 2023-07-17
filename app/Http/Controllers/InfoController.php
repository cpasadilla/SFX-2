<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\order;
use App\Models\parcel;
use App\Models\CustomerID;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function index()
    {
        //Check if user is staff or not
        $check = Auth::user()->isStaff;
        if($check == 0){
        $data = Auth::user()->customerID->cID;
        $status = order::where('cID',$data)->get();
        $order = order::where('cID',$data)->latest()->first();
        $parcel = parcel::where('orderId',$order->orderId)->get();
    }
    else{
        $parcel = "";
        $order = "";
        $status = "";
    }
        return view('cust-view.welcome', compact('parcel','order','status'));
    }

    protected function bl($key){
        $key = order::where('orderId', $key)->get();
        foreach($key as $kiss){
            $customer = $kiss->cID;
            $oId = $kiss->orderId;
        }
        $data = CustomerID::where('cID',$customer)->get();
        $parcel = parcel::where('orderId',$oId)->get();
        return view('cust-view.bl', compact('key','data','parcel'));
    }
}
