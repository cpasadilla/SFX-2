<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerID;
use App\Models\User;
use App\Models\priceList;
use App\Models\order;
use App\Models\parcel;
use App\Models\cargo;
use App\Models\weight;
use Illuminate\Support\Facades\DB;

class shipController extends Controller
{

    private $database;

    public function __construct()
    {
        $this->database = \App\Services\FirebaseService::connect();
    }


    protected function index(){
        $key = "";
        $data = "";
        $parcel = "";
        return view('ship.scan',compact('key','data','parcel'));
}
protected function pick(){
        
    return view('ship.pick');
}

protected function weight(){
    $key = $this->database
    ->getReference('test/weight')->getValue();
        
    return view('ship.weight',compact('key'));
}


protected function update(){
        
    return view('ship.update');
}
 //UPDATE STATUS
 protected function ship(Request $request){
    $key = $request->key;
    // Get the order items from the form data
    $orderItems = json_decode($request->input('orderItems'));
    date_default_timezone_set('Asia/Manila');
    $date = date("F d 20y - g:i a");
    foreach ($orderItems as $item) {
        $id = $item->id;
        $first = substr($id, 0, 1);
        if($first == "S"){
            $cargo = cargo::where('cargoID',$id)->get();
            foreach($cargo as $cargos){
                $ids = $cargos->id;
            }
    
        $data = order::where('cargoId',$ids)->get();
        foreach($data as $orders){
            $orderid = $orders->orderId;
            DB::table('orders')
            ->where('orderId',$orderid)
            ->update([$key=>$date]);
        }
        }
    }
    if($key == "parcelReceived"){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'num' => ['required', 'numeric', 'digits:11'],
            
        ]);
        $name = $request->name;
        $num = $request->num;
        foreach ($orderItems as $item) {
            
            $id = $item->id;
        $first = substr($id, 0, 1);
        if($first == "S"){
            $cargo = cargo::where('cargoID',$id)->get();
            foreach($cargo as $cargos){
                $ids = $cargos->id;
            }
    
        $data = order::where('cargoId',$ids)->get();
        foreach($data as $orders){
            $orderid = $orders->orderId;
            DB::table('orders')
            ->where('orderId',$orderid)
            ->update(['personRec'=>$name,'personNum'=>$num,'status'=>'complete']);
        }
        }
             DB::table('orders')
                 ->where('orderId',$id)
                 ->update(['personRec'=>$name,'personNum'=>$num,'status'=>'complete']);
        }
    }
    
    // Add the order items to the order details table
    foreach ($orderItems as $item) {
       $id = $item->id;
        DB::table('orders')
            ->where('orderId',$id)
            ->update([$key=>$date]);
   }

   
    
    // Redirect to the order confirmation page
    return redirect() -> route('o.pick') ;

}

protected function scan(Request $request){
    $data = $request->data;

    $result = $data;
    return $result;
}

protected function scanned($key){
    $first = substr($key, 0, 1);

    if($first == "S"){
        $cargo = $key;
        $cargo = cargo::where('cargoID',$key)->get();
        foreach($cargo as $cargos){
            $ids = $cargos->id;
        }

        $order = order::where('cargoID',$ids)->get();
        $parcel = "0";
        $data = "0";
    }
    else{
        $key = order::where('orderId', $key)->get();
        foreach($key as $kiss){
            $customer = $kiss->cID;
            $oId = $kiss->orderId;
        }
        $data = CustomerID::where('cID',$customer)->get();
        $parcel = parcel::where('orderId',$oId)->get();
        $cargo= "0";
        $order= "0";
    }
        return view('ship.scan', compact('key','data','parcel','cargo','order'));}



 //UPDATE STATUS
 protected function submit(Request $request){

    // Get the order items from the form data
    $orderItems = json_decode($request->input('orderItems'));
    date_default_timezone_set('Asia/Manila');

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'num' => 'required|numeric|max:255',
        'weight' => 'required|numeric|',
    ]);
    
        $cargo = $request->name;
        $ship = $request->num;
        $weight = $request->weight;

        $random = strval(rand(1000,9999));
        $cargoId = "S0".$ship."C".$cargo."0".$random;
    
        
    
    cargo::create([
        'cargoID' => $cargoId,
        'cargoNum' => $cargo,
        'shipNum' => $ship,
        'weight' => $weight,
    ]);

    $cID = cargo::where('cargoID',$cargoId)->get();
    foreach($cID as $id){
        $ids = $id->id;
    }
    // Add the order items to the order details table
    foreach ($orderItems as $item) {
       $id = $item->id;
        DB::table('orders')
            ->where('orderId',$id)
            ->update(['cargoNum'=>$cargo,'cargoID'=>$ids]);
   }

    
    
    // Redirect to the order confirmation page
    return redirect() -> route('o.weight') ;

}

protected function table(){
    $table = cargo::paginate();

    return view('ship.table',compact('table'));
}

protected function qr($key){
    $key = cargo::where('id', $key)->get();
        foreach($key as $cargos){
            $ids = $cargos->id;
        }

    $data = order::where('cargoId',$ids)->get();
    return view('ship.confirm', compact('key','data'));
}
}