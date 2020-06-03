<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        if(isset(Auth::user()->user_id)){
            return redirect('/dashboard');
        }
        return view('auth.login');
    }

    public function login()
    {
        $req = \request()->all();

        $data = array(
            'email' => $req['email'],
            'password' =>  $req['password'],
            'status' => 'enabled'
        );

     /*   $data = array(
            'email' => $req['email'],
            'password' =>  md5($req['password']),
            'status' => 'active'
        );

        $user = DB::table('users')->where($data)->first();*/

        if(Auth::attempt($data)){
            return redirect()->intended('/dashboard');
        } else {
           return redirect()->intended('/');
        }
    }


    public function logout()
    {
        Auth::logout();
        if(Auth::check() != true) {
            return redirect('/');
        }
    }

    public function hash($password)
    {
        $res = Hash::make($password);
        print_r($res);
    }
}
