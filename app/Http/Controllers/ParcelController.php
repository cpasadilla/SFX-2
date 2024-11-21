<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerID;
use App\Models\User;
use App\Models\priceList;
use App\Models\order;
use App\Models\parcel;
class ParcelController extends Controller
{
   protected function index(){
        //$order = order::paginate();
        //$array = [];
        //foreach($order as $key){
        //        $cID = $key->cID;
        //        array_push($array,$cID); 
        //}
        //return view('parcel.home',compact('order'));

        $orders = order::orderBy('shipNum')->orderBy('voyageNum')->get();

        // Group orders by shipNum, then by voyageNum
        $groupedOrders = $orders->groupBy('shipNum')->map(function ($shipOrders) {
            return $shipOrders->groupBy('voyageNum');
        });
        return view('parcel.home', compact('groupedOrders'));
}

//public function showOrdersByShipAndVoyage($shipNum, $voyageNum)
//{
    // Fetch orders by shipNum and voyageNum
    //$orders = order::where('shipNum', $shipNum)
    //               ->where('voyageNum', $voyageNum)
    //               ->get();

    //return view('parcel.orders', compact('orders', 'shipNum', 'voyageNum'));
//}


public function search(Request $request)
{
    $search = $request->input('search');

    // Perform the search query and retrieve the filtered results
    $order = Order::where('orderId', 'like', "%$search%")
        ->orWhere('cID', 'like', "%$search%")
        ->get();

    return view('parcel.home', compact('order'));
}
protected function confirm($key){
        $key = order::where('orderId', $key)->get();
        foreach($key as $kiss){
            $customer = $kiss->cID;
            $oId = $kiss->orderId;
        }
        $data = CustomerID::where('cID',$customer)->get();
        $parcel = parcel::where('orderId',$oId)->get();
        return view('parcel.confirm', compact('key','data','parcel'));
    }

    protected function bl($key){
        $key = order::where('orderId', $key)->get();
        foreach($key as $kiss){
            $customer = $kiss->cID;
            $oId = $kiss->orderId;
        }
        $data = CustomerID::where('cID',$customer)->get();
        $parcel = parcel::where('orderId',$oId)->get();
        return view('parcel.new', compact('key','data','parcel'));
    }
}
