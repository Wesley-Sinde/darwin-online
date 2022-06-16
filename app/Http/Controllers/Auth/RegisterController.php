<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'CustFName' => ['required', 'string', 'max:255'],
            'CustLName' => ['required', 'string', 'max:255'],
            'Title' => ['required', 'string', 'max:255'],
            'Address' => ['required', 'string', 'max:255'],
            'City' => ['required', 'string', 'max:255'],
            'State' => ['required', 'string', 'max:255'],
            'Country' => ['required', 'string', 'max:255'],
            'Phone' => ['required', 'string', 'max:255'],
            'PostCode' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *CustFName CustLName  Title  Address City State Country Phone PostCode email password
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'CustFName' => $data['CustFName'],
            'CustLName' => $data['CustLName'],
            'Title' => $data['Title'],
            'Address' => $data['Address'],
            'City' => $data['City'],
            'State' => $data['State'],
            'Country' => $data['Country'],
            'Phone' => $data['Phone'],
            'PostCode' => $data['PostCode'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
