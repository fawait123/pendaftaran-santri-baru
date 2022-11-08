<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $check = User::where('username',$request->username)->first();
        if(!$check){
            return redirect()->route('login')->with(['message'=>'Username atau password tidak ditemukan']);
        }

        if(!Hash::check($request->password, $check->password)){
            return redirect()->route('login')->with(['message'=>'Username atau password tidak ditemukan']);
        }
        $remember = $request->remember == 'on'?true:false;
        Auth::login($check,$remember);
        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
