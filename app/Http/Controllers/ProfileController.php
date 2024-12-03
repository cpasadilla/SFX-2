<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function show()
    {
        return view('auth.profile');
    }

    public function update(Request $request)
    {
        if ($request->password) {
            DB::table('users')
            ->where('email',$request->email)
            ->update(['password' => Hash::make($request->password)]);
        }

        DB::table('users')
            ->where('email',$request->email)->update([
            'fName' => $request->fName,
            'lName' => $request->lName,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Profile updated.');

    }

    protected function test(){
        return view("layouts.guest");
    }
}
