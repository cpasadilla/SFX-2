<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();

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
                 ->update(['fName'=>$fName,'lName'=>$lName,'email'=>$email,'phoneNum'=>$phoneNum, 'position'=>$position,'location'=>$location]);
        return redirect() -> route('users.index') ;
    }

    public function delete(Request $request){
        $user = $request->id;
        $del = User::find($user);
        $del->delete();
        return redirect() -> route('users.index') ;

    }

    public function reset(Request $request){
        $id = $request->id;
        DB::table('users')
        ->where('id',$id)
        ->update(['password' => Hash::make("Pass1234")]);
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
        $users = User::where('user_id', 'like', "%$id%")
        ->get();
        return view('users.index', compact('users'));

}

}
