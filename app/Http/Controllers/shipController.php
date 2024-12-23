<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\ship;
use App\Models\voyage;
use Illuminate\Http\Request;

class shipController extends Controller
{
    protected function create (Request $request){
        ship::create([
            'number' => $request->ship,
            'reference' => $request->reference,
            'status'=> "IN USE"
        ]);
        return redirect()->route('p.view');

    }


    //SHIP DELETE
    public function delete(Request $request){
        $id = $request->id;
        $del2 = ship::find($id);
        $del2->delete();
        return redirect() -> route('p.view') ;
    }

    //SHIP UPDATE
    public function update(Request $request, $shipId)
    {
        // Validate the incoming request
        $request->validate([
            'status' => 'required|string'
        ]);
        // Find the order by orderId
        $order = ship::find($shipId);
        if ($order) {
            // Update the status
            $order->status = $request->input('status');
            $order->save(); // Save the updated order
            // Redirect or respond
            return redirect()->route('p.view');
        }

        return redirect()->route('p.view')->with('error', 'Order not found!');
    }


     //OR AND AR SUBMIT
     public function OR(Request $request, $shipNum, $voyageNum, $orderId, $dock, $orig)
     {
         // Find the order by orderId
         $or = $request->or;
         $order = order::find($or);
         
         if ($order) {
             // Update the status
             $order->OR = $request->input('OR');
             $order->save(); // Save the updated order
             $voyage = voyage::where('dock',$dock)->where('ship',$shipNum)
            ->where('trip_num',$voyageNum)->get();
            $orders = collect();
            foreach($voyage as $data){
            $search = $data->orderId;
            $find = Order::where('orderId',$search)->where('voyageNum',$orig)->get();
            $orders = $orders->merge($find);
            }
            return redirect()->route('parcels.showVoyage', compact('shipNum', 'voyageNum', 'orders','dock','orig'));
         }

         return redirect()->route('p.view')->with('error', 'Order not found!');
     }


     public function AR(Request $request, $shipNum, $voyageNum, $orderId, $dock, $orig)
     {
         // Find the order by orderId
         $order = order::find($orderId);
         if ($order) {
             // Update the status
             $order->AR = $request->input('AR');
             $order->save(); // Save the updated order
             $orders = Order::where('shipNum', $shipNum)
             ->where('voyageNum', $voyageNum)
             ->get();
             $voyage = voyage::where('dock',$dock)->where('ship',$shipNum)
             ->where('trip_num',$voyageNum)->get();
             $orders = collect();
             foreach($voyage as $data){
             $search = $data->orderId;
             $find = Order::where('orderId',$search)->where('voyageNum',$orig)->get();
             $orders = $orders->merge($find);

             }
             return redirect()->route('parcels.showVoyage', compact('shipNum', 'voyageNum', 'orders','dock','orig'));
         }

         return redirect()->route('p.view')->with('error', 'Order not found!');
     }

}
