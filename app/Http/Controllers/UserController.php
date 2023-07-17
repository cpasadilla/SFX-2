<?php

namespace App\Http\Controllers;

use App\Models\staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = staff::paginate();

        return view('users.index', compact('users'));
    }

    public function edit(Request $request){
        $fName = $request -> fName;
        $lName = $request -> lName;
        $phoneNum = $request -> phoneNum;
        $email = $request -> email;
        $position = $request -> position;
        $location = $request -> location;
        DB::table('users')
                 ->where('email',$email)
                 ->update(['fName'=>$fName,'lName'=>$lName,'email'=>$email,'phoneNum'=>$phoneNum]);
        $key = User::where('email', $email)->get();
                 foreach($key as $kiss){
                     $id = $kiss->id;
                 }
        
        DB::table('staff')
                 ->where('user_id',$id)
                 ->update(['position'=>$position,'location'=>$location,]);
        return redirect() -> route('users.index') ;
    }

    public function delete(Request $request){
        $id = $request->id;
        $user = $request->user;
        $del = User::find($user);
        $del2 = staff::find($id);

        $del->delete();
        $del2->delete();
        return redirect() -> route('users.index') ;

    }

    public function search(Request $request)
{
    $search = $request->input('search');

    // Perform the search query and retrieve the filtered results
    $users = User::where('fName', 'like', "%$search%")
        ->orWhere('lName', 'like', "%$search%")
        ->orWhere('email','like',"%$search%")
        ->get();

        
        $key = $users;
        foreach($key as $keys){
            $id = $keys->id;
        }
        $users = staff::where('user_id', 'like', "%$id%")
        ->get();
        return view('users.index', compact('users'));

}
public function reset(Request $request){
    $id = $request->id;
    $user = $request->user;
    DB::table('users')
    ->where('id',$id)
    ->update(['password' => Hash::make("Pass1234")]);
    return redirect() -> route('users.index') ;

}
}
