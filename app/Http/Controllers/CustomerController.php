<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\CustomerID;
use App\Models\User;
use App\Models\priceList;
use App\Models\order;
use App\Models\parcel;
use App\Models\category;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use PDF;
use Illuminate\Support\Facades\DB;


class CustomerController extends Controller
{
    //CREATE CUSTOMER
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fName' => ['required', 'string', 'max:255'],
            'lName' => ['required', 'string', 'max:255'],
            'phoneNum' => ['required', 'numeric', 'digits:11', 'unique:users'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = CustomerID::paginate();
        $count = count($user);
        $count += 1;
        if($count >= 1 && $count<=9){
            $index = '000'. $count;
        }
        elseif($count >= 10 && $count<=99){
            $index = '00'. $count;
        }
        elseif($count >= 100 && $count<=999){
            $index = '0'. $count;
        }
        else{
            $index = strval($count);
        }
        CustomerID::create([
            'cID' => $index,
            'fName' => $request -> fName,
            'lName' => $request -> lName,
            'phoneNum' => $request -> phoneNum,
        ]);

        return redirect() -> route('customer') ;
    }

    //CUSTOMER VIEW
    protected function index(){
        $users = CustomerID::paginate();
        return view('customers.home', compact('users'));
    }
    //ORDER CREATION
    protected function order($key){
        $users = CustomerID::where('cID', $key)->get();
        $products = priceList::paginate(12);
        $cats = category::all();
        return view('customers.create', compact('users','products','cats'));

    }

    //ORDER SUBMISSION
    protected function submit(Request $request, $key)
{
    // Validate form data
    $validator = Validator::make($request->all(), [
        'ship' => ['required', 'string', 'max:255'],
        'origin' => ['required', 'string', 'max:255'],
        'recs' => ['required', 'string', 'max:255'],
        'cont' => ['required', 'numeric', 'digits:11'],
        'voyage' => ['required', 'string', 'max:255'],
        'containerNum' => ['nullable', 'string', 'max:255'], // Allow container to be empty
        'orderItems' => ['required', 'json'], // Ensure order items are passed as JSON
        'value' => ['nullable', 'string', 'max:255'], // Allow container to be empty
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Decode JSON order items
    $orderItems = json_decode($request->input('orderItems'));
    //dd($orderItems);
    
    // Calculate the total order amount
    $totalAmount = 0;
    foreach ($orderItems as $item) {
        $totalAmount += $item->total;
    }

    // Generate an incrementing orderId

    
 // Get the last orderId in ascending order
 $lastOrder = order::latest('orderId')->first(); // Get the last order by orderId
 $lastId = $lastOrder ? intval(substr($lastOrder->orderId, 2)) : 0; // Extract numeric part of orderId

 // Generate a unique orderId starting from BL01 and incrementing
 do {
     $newId = str_pad($lastId + 1, 2, '0', STR_PAD_LEFT); // Increment by 1 and pad to 2 digits
     $orderId = "BL" . $newId; // Combine with prefix "BL"
     $lastId++; // Increment for next check
 } while (order::where('orderId', $orderId)->exists()); // Check if the orderId already exists

    
    // Add the order items to the order details table
    foreach ($orderItems as $item) {
        parcel::create([
            'itemName' => $item->name,
            'unit' => $item->unit,
            'quantity' => $item->quantity,
            'price' => $item->price,
            'total' => $item->total,
            'orderId' => $orderId,
        ]);
    }

    // Determine destination
    $origin = $request->input('origin');
    $destination = $origin == "Manila" ? "Batanes" : "Manila";

    // Set the current date and time
    date_default_timezone_set('Asia/Manila');
    $date = date("F d 20y - g:i a");

    // Create a new order in the database
    $order = order::create([
        'shipNum' => $request->input('ship'),
        'origin' => $origin,
        'destination' => $destination,
        'totalAmount' => $totalAmount,
        'cID' => $key,
        'orderId' => $orderId,
        'orderCreated' => $date,
        'consigneeName' => $request->input('recs'),
        'consigneeNum' => $request->input('cont'),
        'voyageNum' => $request->input('voyage'),
        'containerNum' => $request->input('container'), // Get container number if provided
        'value' => $request->input('valuation'),
    ]);
    $order->save();

    // Redirect to the order confirmation page
    return redirect()->route('c.confirm', ['key' => $orderId]);
}



    protected function edit(Request $request){
        $fName = $request -> fName;
        $lName = $request -> lName;
        $phoneNum = $request -> phoneNum;
        $id = $request->id;
        DB::table('customer_i_d_s')
                 ->where('id',$id)
                 ->update(['fName'=>$fName,'lName'=>$lName,'phoneNum'=>$phoneNum,]);
        return redirect() -> route('customer') ;
    }



    protected function delete(Request $request){
        $id = $request->id;
        $del2 = CustomerID::find($id);

        $del2->delete();
        return redirect() -> route('customer') ;

        //return response()->json(['message' => 'Item deleted successfully']);

    }




    protected function confirm($key){
        $key = order::where('orderId', $key)->get();
        foreach($key as $kiss){
            $customer = $kiss->cID;
            $oId = $kiss->orderId;
        }
        $data = CustomerID::where('cID',$customer)->get();
        $parcel = parcel::where('orderId',$oId)->get();
        return view('customers.newbl', compact('key','data','parcel')); //pag clinick yung button dyan pupunta
    }
    protected function bl($key){
        $key = order::where('orderId', $key)->get();
        foreach($key as $kiss){
            $customer = $kiss->cID;
            $oId = $kiss->orderId;
        }
        $data = CustomerID::where('cID',$customer)->get();
        $parcel = parcel::where('orderId',$oId)->get();
        return view('customers.new', compact('key','data','parcel'));
    }

    public function search(Request $request)
{
    $search = $request->input('search');

    // Perform the search query and retrieve the filtered results
    $users = CustomerID::where('cID', 'like', "%$search%")
        ->get();
    if($users->isEmpty())
    {
        $users = User::where('fName', 'like', "%$search%")
        ->orWhere('lName', 'like', "%$search%")
        ->get();

        $key = $users;
        foreach($key as $keys){
            $id = $keys->id;
        }
        $users = CustomerID::where('user_id', 'like', "%$id%")
        ->get();
    }
    return view('customers.home', compact('users'));
}

public function showBL(Request $request, $key){
    $users = CustomerID::where('cID', $key)->get();

    $orders = Order::where('cID', $key)->get();

    return view('customers.parcels', compact('users','orders'));
}

public function audit(Request $request, $key){
    $orders = Order::where('orderID', $key)->get();
    foreach($orders as $order){
        $id = $order->cID;
    }
    $users = CustomerID::where('cID', $id)->get();
    $parcels = parcel::where('orderId',$key)->get();
    $array = array();
    foreach ($parcels as $parcel){
        array_push($array,array(
            'name' => $parcel->itemName,
            'unit' => $parcel->unit,
            'price' => $parcel->price,
            'quantity' => $parcel->quantity,
            'total' => $parcel->total,
        ));
    }

    $data = json_encode($array);
    $products = priceList::paginate(12);
    $cats = category::all();

    return view('customers.update', compact('users','orders','products','cats','data'));
}
protected function update(Request $request, $key)
{
    // Validate form data
    $validator = Validator::make($request->all(), [
        'ship' => ['required', 'string', 'max:255'],
        'origin' => ['required', 'string', 'max:255'],
        'recs' => ['required', 'string', 'max:255'],
        'cont' => ['required', 'numeric', 'digits:11'],
        'voyage' => ['required', 'string', 'max:255'],
        'containerNum' => ['nullable', 'string', 'max:255'], // Allow container to be empty
        'orderItems' => ['required', 'json'], // Ensure order items are passed as JSON
        'value' => ['nullable', 'string', 'max:255'], // Allow container to be empty
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Decode JSON order items
    $orderItems = json_decode($request->input('orderItems'));
    //dd($orderItems);
    // Calculate the total order amount
    $totalAmount = 0;
    foreach ($orderItems as $item) {
        $totalAmount += $item->total;
    }

    $orderId = $key;

    parcel::where('orderId', $orderId)->delete();
    order::where('orderId', $orderId)->delete();

    // Add the order items to the order details table
    foreach ($orderItems as $item) {
        parcel::create([
            'itemName' => $item->name,
            'unit' => $item->unit,
            'quantity' => $item->quantity,
            'price' => $item->price,
            'total' => $item->total,
            'orderId' => $orderId,
        ]);
    }

    // Determine destination
    $origin = $request->input('origin');
    $destination = $origin == "Manila" ? "Batanes" : "Manila";

    // Set the current date and time
    date_default_timezone_set('Asia/Manila');
    $date = date("F d 20y - g:i a");

    // Create a new order in the database
    $order = order::create([
        'shipNum' => $request->input('ship'),
        'origin' => $origin,
        'destination' => $destination,
        'totalAmount' => $totalAmount,
        'cID' => $request->input('id'),
        'orderId' => $orderId,
        'orderCreated' => $date,
        'consigneeName' => $request->input('recs'),
        'consigneeNum' => $request->input('cont'),
        'voyageNum' => $request->input('voyage'),
        'containerNum' => $request->input('container'), // Get container number if provided
        'value' => $request->input('valuation'),
    ]);
    $order->save();

    // Redirect to the order confirmation page
    return redirect()->route('c.confirm', ['key' => $orderId]);
}
}
