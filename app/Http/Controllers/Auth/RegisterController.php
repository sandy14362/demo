<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;

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
            'name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
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
        //echo "ds<pre>";print_r($data);exit;
        $html="<h3>Hello</h3><br/>";
        $html.="<p>Your Registration is done successfuly.</p><br/>";
        $html.="<p>Thanks</p><br/>";
        $html.="<p>Moderni</p><br/>";
        $data_array = array('name'=>$data['first_name']." ".$data['last_name'],'email'=>$data['email']);
        $email=$data['email'];
        
        Mail::send(['html'=>'mail'], $data_array, function($message) use ($data_array) {
            $message->to($data_array['email'], 'Testing Point')->subject
                ('Laravel Basic Testing Mail');
            $message->from('developer3@moderni.in','swati');
        });
        //echo "Basic Email Sent. Check your inbox.";
        
        return User::create([
            'name' => $data['name'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
