<?php

namespace App\Http\Controllers;

use App\Libraries\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use File;

class UserController extends Controller
{
    public function index()
    {
      $data = array(
           'validation' => true,
           'datatables' => true,
          'datatables_button' => true
       );
        return view('dashboard.users.index')->with($data);
    }

    public function Save()
    {
        $req = \request()->all();
        $file_upload_path = 'assets/dashboard/user_images';

        $data = array(
            'name' => $req['name'],
            'email' => $req['email'],
            'password' => Hash::make($req['pass']),
            'mobile' => $req['mobile'],
            'image' => FileUpload::Upload($req['upload'],$file_upload_path),
            'status' => 'enabled'
        );

        $res = DB::table('users')->insert($data);

        if($res == 1){
            $message = 'message|Users Inserted Successfull...';
            return AlertController::FlshMessage($message, '/dashboard/users');
        } else {
            $message = 'error|Users Inserted Error...';
            return AlertController::FlshMessage($message);
        }
    }

    public function editStatus()
    {
        $id = \request()->id;
        $current_status = \request()->status;
        $status = $current_status == 'enabled' ? 'disabled' : 'enabled';
        $res = DB::table('users')->where('user_id', $id)->update(['status' => $status]);
        return $res;
    }

    public function Update()
    {
        $req = \request()->all();
        $file_upload_path = 'assets/dashboard/user_images';
        $user_id = $req['user_id'];

        $data = array(
            'name' => $req['name'],
            'email' => $req['email'],
            'mobile' => $req['mobile'],
            'status' => 'enabled'
        );

        if(isset($req['pass'])){
            $data['password'] = Hash::make($req['pass']);
        }

        if(isset($req['upload'])){
            $this->DeleteUserImage($user_id);
            $data['image'] = FileUpload::Upload($req['upload'],$file_upload_path);
        }

        $res = DB::table('users')->where('user_id', $user_id)->update($data);

        if($res == 1){
            $message = 'message|Users Updated Successfull...';
            return AlertController::FlshMessage($message, '/dashboard/users');
        } else {
            $message = 'error|Users Updated Error...';
            return AlertController::FlshMessage($message);
        }
    }

    private function DeleteUserImage($id)
    {
        //$actual_link = "http://$_SERVER[HTTP_HOST]";

        $user = DB::table('users')->where('user_id', $id)->first();

         /*  if($actual_link == 'http://localhost'){
                $destination_path = public_path().'/'.$user->image;
            } else {
                $path = $user->image . '/';
                $destination_path = $path;
            }*/

        $destination_path = public_path().'/'.$user->image;

        if(is_file($destination_path)){
            unlink($destination_path);
        }
    }

    public function Edit()
    {
        $id = \request()->id;
        $res = DB::table('users')->where('user_id', $id)->first();
       return [$res];
    }

    public function Delete()
    {
        $id = \request()->id;
        $this->DeleteUserImage($id);
        $res = DB::table('users')->where('user_id',$id)->delete();
        return $res;
    }

    public function serverside()
    {
       $res = DB::table('users')->get();
        return datatables($res)->toJson();
    }
}
