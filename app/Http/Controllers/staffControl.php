<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\staff;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class staffControl extends Controller
{

    public function index()
    {

        return view('users.create');
    }

    protected function validator(array $data)
    {
        $messages2 = [    'position.required' => 'Please select a valid position.',    'position.not_in' => 'Please select a valid position.',
        'location.required' => 'Please select a valid location.',    'location.not_in' => 'Please select a valid location.'];

        return Validator::make($data, [
            'fName' => ['required', 'string', 'max:255'],
            'lName' => ['required', 'string', 'max:255'],
            'phoneNum' => ['required', 'numeric', 'digits:11', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'location' => ['required', 'string', 'max:255',Rule::notIn(['Choose Location'])],
            'position' => ['required', 'string', 'max:255',Rule::notIn(['Choose Position'])],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],$messages2,);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        
        User::create([
            'fName' => $data['fName'],
            'lName' => $data['lName'],
            'phoneNum' => $data['phoneNum'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'isStaff' => '1',
        ]);
        $email = $data['email'];
        $id = User::where('email', $email)->get();
        foreach($id as $value){
                $store = $value->id;
            
        }
        staff::create([
            'user_id' => $store,
            'position' => $data['position'],
            'location' => $data['location'],
        ]);

        return redirect()->route('users.index');
    }

    
}
