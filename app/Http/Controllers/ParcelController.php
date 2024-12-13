<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerID;
use App\Models\Customer;
use App\Models\User;
use App\Models\priceList;
use App\Models\order;
use App\Models\parcel;
use App\Models\ship;
use App\Models\voyage;

class ParcelController extends Controller
{

    public function index()
    {

        $ships = ship::paginate();
        return view('parcel.home', compact( 'ships'));
    }

    // Display voyages for a specific ship number
    public function showShip($shipNum)
    {
        $voyages = voyage::where('ship',$shipNum)->orderBy('dock')->get();
        $data = [];

        foreach($voyages as $row){
            if($row->dock == NULL){
            $data[0][$row->trip_num] = $row->trip_num;
            }
            else{
            $data[$row->dock][$row->trip_num] = $row->trip_num;
        }
        }
        return view('parcel.ship', compact('shipNum','data'));
    }

    // Display orders for a specific ship number and voyage number
    public function showVoyage($shipNum, $voyageNum, $dock)
    {
        if($dock == 0){
            $dock = NULL;
        }
        $voyage = voyage::where('dock',$dock)->where('ship',$shipNum)
        ->where('trip_num',$voyageNum)->get();
        $orders = collect();
        foreach($voyage as $data){
            $search = $data->orderId;
            $find = Order::where('orderId',$search)->get();
            $orders = $orders->merge($find);

        }
        return view('parcel.voyage', compact('shipNum', 'voyageNum', 'orders'));
    }
//    public function showVoyages($shipNum, $voyageNum)
//{
//    $orders = Order::with('customer') // Include the customer relationship
//        ->where('shipNum', $shipNum)
//        ->where('voyageNum', $voyageNum)
//        ->get();

//    return view('parcel.voyage', compact('shipNum', 'voyageNum', 'orders'));
//}
    public function search(Request $request)
{
    $search = $request->query('search');
    $orders = Order::where('orderId', 'like', '%' . $search . '%')
                   ->orWhere('cID', 'like', '%' . $search . '%')
                   ->get();
        if($orders->isEmpty()){

            $groupedOrders = Order::orderBy('shipNum')
                ->orderBy('voyageNum')
                ->get()
                ->groupBy('shipNum');

            return view('parcel.home', compact('groupedOrders'));
        }
        foreach ($orders as $order){
            $shipNum = $order->shipNum;
            $voyageNum = $order->voyageNum;
        }
        // Assuming $shipNum and $voyageNum are part of the data passed to the view
        return view('parcel.voyage', [
            'orders' => $orders,
            'shipNum' => $shipNum, // Ensure shipNum is passed
            'voyageNum' => $voyageNum // Ensure voyageNum is passed
        ]);
}


    public function updateStatus(Request $request, $shipNum, $voyageNum, $orderId)
    {
        // Validate the incoming request
        $request->validate([
            'status' => 'required|string'
        ]);
        // Find the order by orderId
        $order = Order::find($orderId);
        if ($order) {
            // Update the status
            $order->status = $request->input('status');
            $order->save(); // Save the updated order

            $orders = Order::where('shipNum', $shipNum)
            ->where('voyageNum', $voyageNum)
            ->get();


            // Redirect or respond
            return redirect()->route('parcels.showVoyage', compact('shipNum', 'voyageNum', 'orders'));
        }

        return redirect()->route('p.view')->with('error', 'Order not found!');
    }

public function bl($key)
{
    // Fetch the order using the correct primary key
    //$order = Order::where('orderId', $key)->first();

    //if (!$order) {
      //  return redirect()->back()->with('error', 'Order not found.');
    //}

    //return view('parcel.new', compact('order'));

    $key = order::where('orderId', $key)->get();
        foreach($key as $kiss){
            $customer = $kiss->cID;
            $oId = $kiss->orderId;
        }
        $data = CustomerID::where('cID',$customer)->get();
        $parcel = parcel::where('orderId',$oId)->get();
        return view('parcel.new', compact('key','data','parcel'));
}

public function blnew($key)
{
    // Fetch the order using the correct primary key
    //$order = Order::where('orderId', $key)->first();

    //if (!$order) {
      //  return redirect()->back()->with('error', 'Order not found.');
    //}

    //return view('parcel.new', compact('order'));

    $key = order::where('orderId', $key)->get();
        foreach($key as $kiss){
            $customer = $kiss->cID;
            $oId = $kiss->orderId;
        }
        $data = CustomerID::where('cID',$customer)->get();
        $parcel = parcel::where('orderId',$oId)->get();
        return view('customers.new', compact('key','data','parcel'));
}


   //protected function index(){
        //$order = order::paginate();
        //$array = [];
        //foreach($order as $key){
        //        $cID = $key->cID;
        //        array_push($array,$cID);
        //}
        //return view('parcel.home',compact('order'));

     //   $orders = order::orderBy('shipNum')->orderBy('voyageNum')->get();

        // Group orders by shipNum, then by voyageNum
       // $groupedOrders = $orders->groupBy('shipNum')->map(function ($shipOrders) {
       //     return $shipOrders->groupBy('voyageNum');
    //    });
      //  return view('parcel.home', compact('groupedOrders'));
//}

//public function showOrdersByShipAndVoyage($shipNum, $voyageNum)
//{
    // Fetch orders by shipNum and voyageNum
    //$orders = order::where('shipNum', $shipNum)
    //               ->where('voyageNum', $voyageNum)
    //               ->get();

    //return view('parcel.orders', compact('orders', 'shipNum', 'voyageNum'));
//}


//public function search(Request $request)
//{
  //  $search = $request->input('search');

    // Perform the search query and retrieve the filtered results
  //  $orders = Order::where('orderId', 'like', "%$search%")
    //    ->orWhere('cID', 'like', "%$search%")
      //  ->orderBy('shipNum')
        //->orderBy('voyageNum')
//        ->get();

    // Group the search results similar to the index method
//    $groupedOrders = $orders->groupBy('shipNum')->map(function ($shipOrders) {
  //      return $shipOrders->groupBy('voyageNum');
    //});

//    return view('parcel.home', compact('groupedOrders'));
//}

//protected function confirm($key){
//        $key = order::where('orderId', $key)->get();
//        foreach($key as $kiss){
            //$customer = $kiss->cID;
//            $oId = $kiss->orderId;
//        }
//        $data = CustomerID::where('cID',$customer)->get();
//        $parcel = parcel::where('orderId',$oId)->get();
//        return view('parcel.confirm', compact('key','data','parcel'));
//    }

  //  protected function bl($key){
//        $key = order::where('orderId', $key)->get();
//        foreach($key as $kiss){
//            $customer = $kiss->cID;
//            $oId = $kiss->orderId;
//        }
//        $data = CustomerID::where('cID',$customer)->get();
//        $parcel = parcel::where('orderId',$oId)->get();
//        return view('parcel.new', compact('key','data','parcel'));
//    }
}
