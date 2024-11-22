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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
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

        $user = User::where('isStaff','0')->get();
        $count = count($user);
        if($count == null){
            $count = 0;
           }
            $date = date("mdy");
            $count = $count + 1;
            if($count < 10){
              $index = $date."00".$count;
            }
            else if($count > 10 && $count < 100 ){
               $index = $date."0".$count;
            }
            else{
              $index = $date.$count;
            }

        User::create([
            'fName' => $request -> fName,
            'lName' => $request -> lName,
            'phoneNum' => $request -> phoneNum,
            'email' => $request -> email,
            'password' => Hash::make('Pass1234'),
            'isStaff' => '0',
        ]);


        $email = $request -> email;
        $id = User::where('email', $email)->get();
        foreach($id as $value){
                $store = $value->id;

        }
        CustomerID::create([
            'cID' => $index,
            'user_id'=> $store,
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

    // Calculate the total order amount
    $totalAmount = 0;
    foreach ($orderItems as $item) {
        $totalAmount += $item->total;
    }

    // Generate an incrementing orderId
    $lastOrder = order::latest('orderId')->first(); // Get the last order by orderId
    $lastId = $lastOrder ? intval(substr($lastOrder->orderId, 2)) : 0; // Extract numeric part of orderId
    $newId = str_pad($lastId + 1, 4, '0', STR_PAD_LEFT); // Increment and pad with leading zeros
    $orderId = "BL" . $newId; // Combine with prefix "BL"

    // Add the order items to the order details table
    foreach ($orderItems as $item) {
        parcel::create([
            'itemName' => $item->name,
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
        $email = $request -> email;

        DB::table('users')
                 ->where('email',$email)
                 ->update(['fName'=>$fName,'lName'=>$lName,'email'=>$email,'phoneNum'=>$phoneNum,]);
        return redirect() -> route('customer') ;
    }



    protected function delete(Request $request){
        $id = $request->id;
        $user = $request->user;
        $del = User::find($user);
        $del2 = CustomerID::find($id);

        $del->delete();
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
public function reset(Request $request){
    $id = $request->id;
    DB::table('users')
    ->where('id',$id)
    ->update(['password' => Hash::make("Pass1234")]);
    return redirect() -> route('users.index') ;

}

public function showBL(Request $request, $key){
    $users = CustomerID::where('cID', $key)->get();

    $orders = Order::where('cID', $key)->get();
    return view('customers.parcels', compact('users','orders'));
}

public function update(Request $request, $key){
    $orders = Order::where('orderID', $key)->get();
    foreach($orders as $order){
        $id = $order->cID;
    }
    $users = CustomerID::where('cID', $id)->get();

    $products = priceList::paginate(12);
    $cats = category::all();

    return view('customers.update', compact('users','orders','products','cats'));
}
}
