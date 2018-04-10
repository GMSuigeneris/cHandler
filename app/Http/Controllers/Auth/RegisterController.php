<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
            'username' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'middlename' => 'string|max:255',
            'firstname' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'avatar' => 'image|string|max:1999',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if($data['image']){
            $fileNameWithExt = $data['image']->getClientOriginalName();
            //File name without ext
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //Extension
            $extension = $data['image']->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path = $data['image']->storeAs('public/cover_images',$fileNameToStore);
            //$path = $data['image']->move('uploads',$fileNameToStore);
        }else{
            $fileNameToStore ="noimage.jpg";
        }

        return User::create([
            'username' => $data['username'],
            'first_name' => $data['firstname'],
            'last_name' => $data['lastname'],
            'middle_name' => $data['middlename'],
            'city' => $data['city'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar'=>$fileNameToStore
        ]);
    }
}
