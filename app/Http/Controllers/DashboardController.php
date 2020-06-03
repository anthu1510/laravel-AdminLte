<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $data = array(
            'validation' => true,
            'datatables' => true
        );
        return view('dashboard.dashboard')->with($data);
    }

    public function changePassword()
    {
        $data = array(
            'validation' => true,
            'datatables' => true
        );
        return view('dashboard.profile.changepassword_form')->with($data);
    }

    public function changePasswordUpdate()
    {
        $req = \request()->all();
        $id = Auth::user()->user_id;

        $user = DB::table('users')->where('user_id',$id)->first();

        $newpassword = $req['new_pass'];
        $oldpassword = $req['current_pass'];
        $storedpassword = $user->password;

        $res = Hash::check($oldpassword, $storedpassword);

        if($res){
            $result =  DB::table('users')->where('user_id',$id)->update(['password' => Hash::make($newpassword)]);
            if($result) {
                $message = 'message|Password Updated Successfull...';
            } else {
                $message = 'error|Password Updated Error...';
            }
        } else {
            $message = 'error|Current Password Does not Matched....';
        }

        return AlertController::FlshMessage($message);
    }
}
