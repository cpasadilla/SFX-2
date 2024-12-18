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
use App\Models\ship;
use App\Models\voyage;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PDF;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class CustomerController extends Controller {
    //CREATE CUSTOMER
    protected function validator(array $data){
        return Validator::make($data, [
            'fName' => ['required', 'string', 'max:255'],
            'lName' => ['required', 'string', 'max:255'],
            'phoneNum' => ['required', 'numeric', 'digits:11', 'unique:customer_i_d_s'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

    //CUSTOMER VIEW
    protected function index() {
        $users = CustomerID::paginate();
        return view('customers.home', compact('users'));
    }

    //customer creation
    protected function create(Request $request) {
        $this->validator($request->all())->validate();

        $user = CustomerID::paginate();
        $count = count($user);
        $count += 1;
        if($count >= 1 && $count<=9){
            $index = '000'. $count;
        } elseif($count >= 10 && $count<=99){
            $index = '00'. $count;
        } elseif($count >= 100 && $count<=999){
            $index = '0'. $count;
        } else{
            $index = strval($count);
        }

        CustomerID::create([
            'cID' => $index,
            'fName' => ucfirst(strtolower($request -> fName)),
            'lName' => ucfirst(strtolower($request -> lName)),
            'phoneNum' => $request -> phoneNum,
        ]);

        return redirect() -> route('customer') ;
    }

    //customer search
    public function search(Request $request) {
        $search = $request->input('search');

        // Perform the search query and retrieve the filtered results
        $users = CustomerID::where('cID', 'like', "%$search%")
            ->get();
        if($users->isEmpty()) {
            $users = CustomerID::where('fName', 'like', "%$search%")
                ->orWhere('lName', 'like', "%$search%")
                ->get();
            if($users->isEmpty()){
                $users = CustomerID::paginate();
            }
        }
        return view('customers.home', compact('users'));
    }

    //customer edit
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

    //ORDER CREATION
    protected function order($key){
        $users = CustomerID::where('cID', $key)->get();
        $products = priceList::paginate(12);
        $cats = category::all();
        $ship = ship::all();
        return view('customers.create', compact('users','products','cats','ship'));
    }

    //search order page
    public function scout(Request $request, $key){
        $search = $request->input('search');

        // Perform the search query and retrieve the filtered results
        $items = priceList::where('itemName', 'like', "%$search%")
            ->get();
        $cats = category::paginate();

        if($items->isEmpty()){
            $cats = category::where('name', 'like', "%$search%")
                ->get();
            if($cats->isEmpty()){
                $items = priceList::paginate(12);
            } else{
                $key = $cats;
                foreach($key as $keys){
                    $id = $keys->id;
                }
                $items = priceList::where('category', 'like', "%$id%");
                $items = $items->paginate();
            }
        } else{
            $items = priceList::where('itemName', 'like', "%$search%");
            $items = $items->paginate();
        }
        $products = $items;
        $cats = category::paginate();
        $users = CustomerID::where('cID', $key)->get();
        return view('customers.create', compact('users','products','cats'));
    }

    //ORDER SUBMISSION
    protected function submit(Request $request, $key)
    {
        $message = [
            'origin.required' => 'Please select a valid origin.',
            'origin.not_in' => 'Please select a valid origin.'
        ];

        // Validate form data
        $validator = Validator::make($request->all(), [
            'ship' => ['required', 'string', 'max:255'],
            'origin' => ['required', 'string', 'max:255', Rule::notIn(['Choose Origin'])],
            'destination' => ['required', 'string', 'max:255'],
            'recs' => ['required', 'string', 'max:255'],
            'cont' => ['required', 'numeric', 'digits:11'],
            'containerNum' => ['nullable', 'string', 'max:255'],
            'orderItems' => ['required', 'json'],
            'value' => ['nullable', 'string', 'max:255'],
            'mark' => ['nullable', 'string', 'max:255'],
            'check' => ['nullable', 'string', 'max:255'],
        ], $message);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Decode JSON order items
        $orderItems = json_decode($request->input('orderItems'));

        // Calculate the total order amount
        $totalAmount = 0;
        foreach ($orderItems as $item) {
            $totalAmount += $item->total;
        }

        // Set the current date and time
        date_default_timezone_set('Asia/Manila');
        $date = date("F d 20y - g:i:s a");

        $ship = intval($request->input('ship'));
        $bl = "BL" . $ship;

        // Generate an incrementing orderId
        $first = Order::where('orderId', 'like', "%$bl%")
            ->latest()
            ->first();

        if ($first === null) {
            $orderId = $bl . "-01";
        } else {
            $last = $first->orderId;

            // Adjust regex to match only the numerical portion
            if (preg_match('/(\d+)$/', $last, $matches)) {
                $int = intval($matches[1]);
            } else {
                $int = 0; // Default to 0 if no match is found
            }

            $int += 1;
            $str = $int <= 9 ? "0$int" : "$int";
            $orderId = $bl . "-" . $str;
        }

        $origin = $request->input('origin');
        $destination = $request->input('destination');
        $voyageSuffix = ($origin === 'Manila' && $destination === 'Batanes') ? '-OUT' : (($origin === 'Batanes' && $destination === 'Manila') ? '-IN' : '');

        // VOYAGE LOGIC
        $checks = Ship::where('number', $ship)->get();
        foreach ($checks as $check) {
            $status = $check->status;
        }

        $trip = Voyage::where('ship', $ship)->orderBy('date', 'desc')->first();
        if ($status === 'READY') {
            $dock = intval($trip->dock) + 1;

            $voyage = 1;
            foreach ($checks as $check) {
                $check->status = "ON PORT";
                $check->save();
            }

            Voyage::create([
                'ship' => $ship,
                'trip_num' => $voyage,
                'date' => $date,
                'dock' => $dock,
                'orderId' => $orderId,
                'voyage_number' => $voyage . $voyageSuffix,
            ]);
        } elseif ($status === 'ARRIVED') {
            $voyage = intval($trip->trip_num) + 1;
            foreach ($checks as $check) {
                $check->status = "ON PORT";
                $check->save();
            }
            $dock = $trip?->dock ? intval($trip->dock) : null;

            Voyage::create([
                'ship' => $ship,
                'trip_num' => $voyage,
                'date' => $date,
                'dock' => $dock,
                'orderId' => $orderId,
                'voyage_number' => $voyage . $voyageSuffix,
            ]);
        } else {
            $voyage = $trip ? intval($trip->trip_num) : 1;
            $dock = $trip?->dock ? intval($trip->dock) : null;

            Voyage::create([
                'ship' => $ship,
                'trip_num' => $voyage,
                'date' => $date,
                'dock' => $dock,
                'orderId' => $orderId,
                'voyage_number' => $voyage . $voyageSuffix,
            ]);
        }

        // Add the order items to the order details table
        foreach ($orderItems as $item) {
            Parcel::create([
                'itemName' => $item->name,
                'unit' => $item->unit,
                'quantity' => $item->quantity,
                'price' => $item->price,
                'total' => $item->total,
                'orderId' => $orderId,
            ]);
        }

        // Create a new order in the database
        $order = Order::create([
            'shipNum' => $request->input('ship'),
            'origin' => $origin,
            'destination' => $destination,
            'totalAmount' => $totalAmount,
            'cID' => $key,
            'orderId' => $orderId,
            'orderCreated' => $date,
            'consigneeName' => $request->input('recs'),
            'consigneeNum' => $request->input('cont'),
            'voyageNum' => $voyage . $voyageSuffix,
            'containerNum' => $request->input('containerNum'),
            'value' => $request->input('valuation'),
            'mark' => $request->input('remark'),
            'check' => $request->input('check'),
        ]);
        $order->save();

        // Redirect to the order confirmation page
        return redirect()->route('c.confirm', ['key' => $orderId]);
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

    //NEW FUNCTIONS
    //SHOW CUSTOMER BL
    public function showBL(Request $request, $key){
        $users = CustomerID::where('cID', $key)->get();
        $orders = Order::where('cID', $key)->get();
        return view('customers.parcels', compact('users','orders'));
    }
    //update page CUSTOMER BL
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
                'id'=>$parcel->id,
                'name' => $parcel->itemName,
                'unit' => $parcel->unit,
                'price' => $parcel->price,
                'quantity' => $parcel->quantity,
                'total' => $parcel->total,
                //'mark' => $parcel->remark,
            ));
        }
        $data = json_encode($array);
        $products = priceList::paginate(12);
        $cats = category::all();
        return view('customers.update', compact('users','orders','products','cats','data'));
    }
    //UPDATE CUSTOMER BL
    protected function update(Request $request, $key) {
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
            'mark' => ['nullable', 'string', 'max:255'], // Allow container to be empty
            'check' => ['nullable', 'string', 'max:255'], // Allow container to be empty
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
        $destination =  $request->input('destination');

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
            'mark' => $request->input('remark'),
            'check' => $request->input('checker'),
        ]);
        $order->save();
        // Redirect to the order confirmation page
        return redirect()->route('c.confirm', ['key' => $orderId]);
    }

    //SEARCH UPDATE BL
    public function find(Request $request, $key) {
        $search = $request->input('search');
        // Perform the search query and retrieve the filtered results
        $items = priceList::where('itemName', 'like', "%$search%")
            ->get();
        $cats = category::paginate();

        if($items->isEmpty()){
            $cats = category::where('name', 'like', "%$search%")
                ->get();
            if($cats->isEmpty()){

            }
            $key = $cats;
            foreach($key as $keys){
                $id = $keys->id;
            }
            $items = priceList::where('category', 'like', "%$id%");
        } else{
            $items = priceList::where('itemName', 'like', "%$search%");
        }
        $products = $items->paginate();
        $cats = category::paginate();
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
        return view('customers.update', compact('users','orders','products','cats','data'));
    }



     //OR AND AR SUBMIT
     public function OR(Request $request, $key, $orderId)
     {
         // Find the order by orderId
         $order = order::find($orderId);
         if ($order) {
             // Update the status
             $order->OR = $request->input('OR');
             $order->save(); // Save the updated order



             // Redirect or respond
             return redirect()->route('c.parcels', ['key' => $key]);
         }

         return redirect()->route('p.view')->with('error', 'Order not found!');
     }


     public function AR(Request $request, $key, $orderId)
     {
         // Find the order by orderId
         $order = order::find($orderId);
         if ($order) {
             // Update the status
             $order->AR = $request->input('AR');
             $order->save(); // Save the updated order

             return redirect()->route('c.parcels', ['key' => $key]);

         }

         return redirect()->route('p.view')->with('error', 'Order not found!');
     }
}
