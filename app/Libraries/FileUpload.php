<?php


namespace App\Libraries;


class FileUpload
{
    public static function Upload($file,$url,$filename = '',$filepath = 'yes')
    {
        $actual_link = "http://$_SERVER[HTTP_HOST]";

        if($actual_link == 'http://localhost'){
            $path = '/' . $url . '/';
            $destination_path = public_path($path);
        } else {
            $path = $url . '/';
            $destination_path = $path;
        }

        $file_name = !empty($filename) ? $filename : uniqid();
        $img = 1;

        if(is_array($file)){
            foreach ($file as $v){
                $newfilename = $img++.'-'.$file_name . '.' . $v->getClientOriginalExtension();
                $res = $v->move($destination_path,$newfilename);
                $file_url[] = $filepath == 'yes' ? $path . $newfilename : $newfilename;
            }
        } else {
            $newfilename = $img.'-'.$file_name . '.' . $file->getClientOriginalExtension();
            $res = $file->move($destination_path,$newfilename);
            $file_url = $filepath == 'yes' ?$path . $newfilename : $newfilename;
        }


        if($res) {
            return is_array($file_url) ? json_encode($file_url) : $file_url;
        } else {
            return 0;
        }
    }
}
