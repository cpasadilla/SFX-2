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
use Illuminate\Pagination\LengthAwarePaginator;

class ParcelController extends Controller
{
    //index
    public function index()
    {

        $ships = ship::paginate();
        return view('parcel.home', compact( 'ships'));
    }

    // Display voyages for a specific ship number
    public function showShip($shipNum)
{
    $voyages = voyage::where('ship', $shipNum)->orderBy('dock')->get();
    $data = [];
    $order = order::where('shipNum', $shipNum)->get();

    foreach ($voyages as $row) {
        foreach ($order as $num) {
            $check = $num->voyageNum;

            preg_match('/\d+/', $check, $matches);
            $orig = explode("-", $check);
            $trip = $row->trip_num;
            $dock = $row->dock;
            if ($trip == $matches[0]) {
                if ($shipNum == 3|| $shipNum == 4) {
                    // No distinction between OUT and IN for ship 3
                    if ($row->dock == NULL) {
                        $data[0][$orig[0]][$check] = $trip;
                    } else {
                        $data[$dock][$orig[0]][$check] = $trip;
                    }
                } else {
                    if ($row->dock == NULL) {
                        $data[0][$orig[1]][$check] = $trip;
                    } else {
                        $data[$dock][$orig[1]][$check] = $trip;
                    }
                }
            }
        }
    }
    //dd($data);

    return view('parcel.ship', compact('shipNum', 'data'));
}

    // Display orders for a specific ship number and voyage number
    public function showVoyage($shipNum, $voyageNum, $dock, $orig)
{
    $docks = $dock;
    if($dock == 0){
        $docks = NULL;
    }

    $voyage = voyage::where('dock', $docks)->where('ship', $shipNum)
        ->where('trip_num', $voyageNum)->get();
    
    $order = collect();
    foreach ($voyage as $data) {
        $search = $data->orderId;
        $find = Order::where('orderId', $search)->where('voyageNum', $orig)->get();
        $order = $order->merge($find);
    }

    // Handle the filtering logic based on query parameter 'status'
    $statusFilter = request()->query('status'); // Get the status filter
    if ($statusFilter) {
        if ($statusFilter == 'PAID') {
            $order = $order->where('bl_status', 'PAID');
        } elseif ($statusFilter == 'UNPAID') {
            $order = $order->where('bl_status', 'UNPAID');
        } elseif ($statusFilter == 'NO_STATUS') {
            $order = $order->whereNull('bl_status');
        }
    }

    // Paginate the collection manually
    $perPage = 10; // Number of items per page
    $currentPage = request()->input('page', 1); // Get current page from request
    $currentItems = $order->slice(($currentPage - 1) * $perPage, $perPage)->values(); // Get only the items for the current page

    $orders = new LengthAwarePaginator(
        $currentItems,
        $order->count(),
        $perPage,
        $currentPage,
        ['path' => request()->url(), 'query' => request()->query()]
    );

    return view('parcel.voyage', compact('shipNum', 'voyageNum', 'orders', 'dock', 'orig'));
}


    //search
    public function search(Request $request)
{
    $search = $request->query('search');
    $orders = Order::where('orderId', 'like', '%' . $search . '%')
                   ->orWhere('cID', 'like', '%' . $search . '%')
                   ->orWhere('cargo_status', 'like', '%' . $search . '%')
                   ->paginate(10);
        if($orders->isEmpty()){

            $ships = ship::paginate();

            return view('parcel.home', compact('ships'));
        }

        foreach ($orders as $order){
            $shipNum = $order->shipNum;
            $voyageNum = $order->voyageNum;

            $voyage = $order->orderId;
        }
        $voyage = voyage::where('orderId',$voyage)->get();
        $check = $voyageNum;
        preg_match('/\d+/', $check, $matches);
        foreach($voyage as $voy){
            $dock = $voy->dock;
            if($dock === NULL){
                $dock = 0;
            }
        }
        // Assuming $shipNum and $voyageNum are part of the data passed to the view
        return view('parcel.voyage', [
            'orders' => $orders,
            'shipNum' => $shipNum, // Ensure shipNum is passed
            'voyageNum' => $matches[0],
            'dock'=>$dock,
            'orig'=>$voyageNum // Ensure voyageNum is passed
        ]);
}

    //update staus
public function updateStatus(Request $request, $shipNum, $voyageNum, $orderId, $dock, $orig)
{
    $request->validate(['status' => 'required|string']);

    $order = Order::find($orderId);
    if ($order) {
        $order->status = $request->input('status');
        $order->save();

        // If ship status changes to ARRIVED, increment the voyage number
        if ($order->status === 'ARRIVED') {
            $latestVoyage = Voyage::where('ship', $shipNum)->latest('id')->first();
            $newVoyageNum = ($latestVoyage) ? $latestVoyage->trip_num + 1 : 1;

            Voyage::create([
                'ship' => $shipNum,
                'trip_num' => $newVoyageNum,
                'date' => now(),
                'dock' => $dock,
                'orderId' => $orderId,
                'voyage_number' => $newVoyageNum . '-' . $orig, // Ensure unique voyage number
            ]);
        }

        return redirect()->route('parcels.showVoyage', compact('shipNum', 'voyageNum', 'dock', 'orig'));
    }

    return redirect()->route('p.view')->with('error', 'Order not found!');
}


//cancel out
public function bl($key)
{

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

    $key = order::where('orderId', $key)->get();
        foreach($key as $kiss){
            $customer = $kiss->cID;
            $oId = $kiss->orderId;
        }
        $data = CustomerID::where('cID',$customer)->get();
        $parcel = parcel::where('orderId',$oId)->get();
        return view('customers.new', compact('key','data','parcel'));
}

}
