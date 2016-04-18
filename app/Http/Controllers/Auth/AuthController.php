<?php

namespace Community\Http\Controllers\Auth;

use Exception;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Auth;
use Community\Http\Controllers\Controller;
use Community\User;
use Socialite;
use Validator;

class AuthController extends Controller
{

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectPath = '/';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
        	'username' => 'required|max:30|unique:users',
        	'year_of' => 'required|max:1',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'address' => 'required|min:8'
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
        	'username' => $data['username'],
        	'year_of' => $data['year_of'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'address' => $data['address']
        ]);
    }

}
