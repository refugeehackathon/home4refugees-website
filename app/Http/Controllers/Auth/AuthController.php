<?php

namespace App\Http\Controllers\Auth;

use App\Refugee;
use App\User;
use App\Host;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectPath = '/';
    protected $redirectTo = '/';


    /**
     * Create a new authentication controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     * @return \Illuminate\Contracts\Validation\Validator
     * @internal param array $data
     */
    protected function userValidator()
    {
        return [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ];
    }

    protected function refugeeValidator()
    {
        return [
            'name' => 'required',
            'sex' => 'required|in:w,m',
            'birthday' => 'required|date_format:d.m.Y'
        ];
    }

    protected function hostValidator()
    {
        return [
            'name' => 'required',
            'email' => 'required|email'
        ];
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function createUser(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    protected function createRefugee(array $data)
    {
        $birthday = explode('.', $data['birthday']);
        return new Refugee([
            'name' => $data['name'],
            'sex' => $data['sex'],
            'birthday' => $birthday[2].'-'.$birthday[1].'-'.$birthday[0]
        ]);
    }

    protected function createHost(array $data)
    {
        return new Host([
            'name' => $data['name']
        ]);
    }

    public function getRefugeeRegister()
    {
        return view('auth.register_refugee');
    }

    public function postRefugeeRegister(Request $request)
    {
        $this->validate($request, array_merge($this->userValidator(), $this->refugeeValidator()));


        $user = $this->createUser($request->all());
        $refugee = $this->createRefugee($request->all());
        $user->refugee()->save($refugee);

        Auth::login($user);

        return redirect($this->redirectPath());
    }

    public function getHostRegister()
    {
        return view('auth.register_host');
    }

    public function postHostRegister(Request $request)
    {
        $this->validate($request, array_merge($this->userValidator(), $this->hostValidator()));


        $user = $this->createUser($request->all());
        $host = $this->createHost($request->all());
        $user->host()->save($host);

        Auth::login($user);

        return redirect($this->redirectPath());
    }
}
