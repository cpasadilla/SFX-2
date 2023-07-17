<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\staff;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
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

    }

    
}
