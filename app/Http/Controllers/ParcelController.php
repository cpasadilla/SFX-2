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
    $docks = ($dock == 0) ? NULL : $dock;

    // Fetch all orders related to this ship and voyage
    $voyage = voyage::where('dock', $docks)
                    ->where('ship', $shipNum)
                    ->where('trip_num', $voyageNum)
                    ->get();

    $allOrders = collect(); // Store all orders for filters and pagination
    foreach ($voyage as $data) {
        $search = $data->orderId;
        $find = Order::where('orderId', $search)
                     ->where('voyageNum', $orig);



        $allOrders = $allOrders->merge($find->get());
    }

    // ✅ Store all orders before filtering and pagination for dropdown filters
    $filterOrders = $allOrders->unique('orderId'); // Ensures all unique orders are included

    // Apply filters (before pagination)
    $filters = [
        'containerNum', 'consigneeName', 'check', 'customer', 'shipper', 'orderId',
        'cargo_status', 'bl_status', 'createdBy', 'description' // ✅ Make sure description is here
    ];
    
    foreach ($filters as $filter) {
        if (request()->has($filter)) {
            $filterValue = request()->query($filter);
            if (!empty($filterValue)) {
                if ($filter === 'shipper') { // Filtering by consignee name
                    $allOrders = $allOrders->filter(function ($order) use ($filterValue) {
                        return ($order->customer->fName . ' ' . $order->customer->lName) === $filterValue;
                    });
                } else {
                    $allOrders = $allOrders->where($filter, $filterValue); // ✅ Check if 'description' exists in orders
                }
            }
        }
    }

    // ✅ Compute overall totals before pagination
    $totalFreightOverall = $allOrders->sum('totalAmount');
    $totalValuationOverall = $allOrders->sum(fn($o) => ($o->value + $o->totalAmount) * 0.0075);
    $totalAmountOverall = $totalFreightOverall + $totalValuationOverall;

    // ✅ Paginate filtered results
    $perPage = 500;
    $currentPage = request()->input('page', 1);
    $currentItems = $allOrders->slice(($currentPage - 1) * $perPage, $perPage)->values();

    $orders = new LengthAwarePaginator(
        $currentItems,
        $allOrders->count(),
        $perPage,
        $currentPage,
        ['path' => request()->url(), 'query' => request()->query()]
    );

    return view('parcel.voyage', compact(
        'shipNum', 'voyageNum', 'orders', 'dock', 'orig',
        'totalFreightOverall', 'totalValuationOverall', 'totalAmountOverall',
        'filterOrders' // ✅ Pass all orders (before pagination) for filtering
    ));
}


public function showVoy($shipNum, $voyageNum, $dock, $orig)
{
    $docks = ($dock == 0) ? NULL : $dock;

    // Fetch all orders related to this ship and voyage
    $voyage = Voyage::where('dock', $docks)
                    ->where('ship', $shipNum)
                    ->where('trip_num', $voyageNum)
                    ->get();

    $allOrders = collect();

    foreach ($voyage as $data) {
        $search = $data->orderId;
        $find = Order::with('parcels') // ✅ Eager-load parcels to avoid extra queries
                     ->where('orderId', $search)
                     ->where('voyageNum', $orig);

        $allOrders = $allOrders->merge($find->get());
    }

    // Fetch parcels related to the retrieved orders
    $parcel = Parcel::whereIn('orderId', $allOrders->pluck('orderId'))->get();

    // Sort orders alphabetically by consignee name
    $sortedOrders = $allOrders->sortBy(fn($order) => strtoupper(optional($order->customer)->fName . ' ' . optional($order->customer)->lName));

    // Paginate the sorted results
    $perPage = 500;
    $currentPage = request()->input('page', 1);
    $currentItems = $sortedOrders->slice(($currentPage - 1) * $perPage, $perPage)->values();

    $orders = new LengthAwarePaginator(
        $currentItems,
        $sortedOrders->count(),
        $perPage,
        $currentPage,
        ['path' => request()->url(), 'query' => request()->query()]
    );

    return view('parcel.voy', compact(
        'shipNum', 'voyageNum', 'orders', 'dock', 'orig', 'parcel'
    ));
}

public function updatePaidLocation(Request $request)
{
    $request->validate([
        'orderId' => 'required|string|exists:orders,orderId',
        'paid_location' => 'required|string|in:Manila,Batanes'
    ]);

    $order = Order::where('orderId', $request->orderId)->first();
    $order->paid_location = $request->paid_location; // Save selected location
    $order->save();

    return response()->json(['success' => true, 'message' => 'Payment location updated.']);
}

///////

    //search
    public function search(Request $request)
{
    $search = $request->query('search');

    // Retrieve matching orders
    $orders = Order::where('orderId', 'like', '%' . $search . '%')
                   ->orWhere('cID', 'like', '%' . $search . '%')
                   ->orWhere('cargo_status', 'like', '%' . $search . '%')
                   ->get(); // Remove pagination temporarily to filter first

    if ($orders->isEmpty()) {
        // If no results, return home page with an empty orders list
        $ships = Ship::paginate();
        return view('parcel.home', compact('ships'))->with('error', 'No orders found.');
    }

    // Fetch voyage details based on the first found order
    $order = $orders->first();
    $shipNum = $order->shipNum;
    $voyageNum = $order->voyageNum;

    // Extract `$orig` safely
    preg_match('/\d+/', $voyageNum, $matches);
    $orig = $matches[0] ?? $voyageNum; // Ensure $orig is always set

    // Get voyage details
    $voyage = Voyage::where('orderId', $order->orderId)->first();
    if (!$voyage) {
        return back()->with('error', 'Voyage details not found.');
    }

    // Ensure `dock` is properly set
    $dock = $voyage->dock ?? 0;

    // ✅ Fix: Ensure `$filterOrders` is included
    $filterOrders = $orders->unique('orderId'); 

    // ✅ Paginate results after filtering
    $perPage = 500;
    $currentPage = request()->input('page', 1);
    $currentItems = $orders->slice(($currentPage - 1) * $perPage, $perPage)->values();

    $orders = new LengthAwarePaginator(
        $currentItems,
        $orders->count(),
        $perPage,
        $currentPage,
        ['path' => request()->url(), 'query' => request()->query()]
    );

    return view('parcel.voyage', compact(
        'orders', 'shipNum', 'voyageNum', 'dock', 'orig', 'filterOrders' // ✅ Include this
    ));
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
public function storeOR(Request $request, $shipNum, $voyageNum, $orderId, $dock, $orig)
{
    $request->validate([
        'OR' => 'nullable|string|max:255' // Allow OR to be empty (nullable)
    ]);

    $order = Order::find($orderId);
    if ($order) {
        $order->OR = $request->input('OR') ?: null; // Set to NULL if empty

        // If both OR and AR are empty, reset bl_status
        if (empty($order->OR) && empty($order->AR)) {
            $order->bl_status = null; // Reset bl_status
        } else {
            $order->bl_status = 'PAID'; // Set to PAID if any value exists
        }

        $order->save();
    }

    // ✅ Preserve the page number when redirecting
    $currentPage = $request->input('page', 1);
    return redirect()->route('parcels.showVoyage', [
        'shipNum' => $shipNum,
        'voyageNum' => $voyageNum,
        'dock' => $dock,
        'orig' => $orig,
        'page' => $currentPage // ✅ Append the current page number
    ])->with('success', 'OR updated successfully.');
}

public function storeAR(Request $request, $shipNum, $voyageNum, $orderId, $dock, $orig)
{
    $request->validate([
        'AR' => 'nullable|string|max:255' // Allow AR to be empty (nullable)
    ]);

    $order = Order::find($orderId);
    if ($order) {
        $order->AR = $request->input('AR') ?: null; // Set to NULL if empty

        // If both OR and AR are empty, reset bl_status
        if (empty($order->OR) && empty($order->AR)) {
            $order->bl_status = null; // Reset bl_status
        } else {
            $order->bl_status = 'PAID'; // Set to PAID if any value exists
        }

        $order->save();
    }

    // ✅ Preserve the page number when redirecting
    $currentPage = $request->input('page', 1);
    return redirect()->route('parcels.showVoyage', [
        'shipNum' => $shipNum,
        'voyageNum' => $voyageNum,
        'dock' => $dock,
        'orig' => $orig,
        'page' => $currentPage // ✅ Append the current page number
    ])->with('success', 'AR updated successfully.');
}

public function updateFreightValuation(Request $request)
{
    $request->validate([
        'orderId' => 'required|string|exists:orders,orderId',
        'field' => 'required|string|in:totalAmount,valuation',
        'value' => 'required|numeric|min:0'
    ]);

    $order = Order::where('orderId', $request->orderId)->first();

    if ($request->field === 'totalAmount') {
        $order->totalAmount = $request->value;
    } elseif ($request->field === 'valuation') {
        $order->value = ($request->value / 0.0075) - $order->totalAmount; // Reverse calculation
    }

    $order->save();

    return response()->json(['success' => true, 'message' => 'Updated successfully.']);
}
public function updateOrderField(Request $request)
{
    $request->validate([
        'orderId' => 'required|string|exists:orders,orderId',
        'field' => 'required|string|in:totalAmount,valuation,OR,AR',
        'value' => 'nullable|string|max:255'
    ]);

    $order = Order::where('orderId', $request->orderId)->first();

    if ($order) {
        $order->{$request->field} = ($request->field === 'totalAmount' || $request->field === 'valuation') 
            ? (float) $request->value 
            : $request->value;

        // Automatically update BL status based on OR and AR
        if (empty($order->OR) && empty($order->AR)) {
            $order->bl_status = 'UNPAID';
        } else {
            $order->bl_status = 'PAID';
        }

        $order->save();
    }

    return response()->json(['success' => true, 'message' => 'Updated successfully.']);
}

}