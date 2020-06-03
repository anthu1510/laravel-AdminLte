<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\HtmlString;

class AlertController extends Controller
{
    public static function FlshMessage($message,$url = '')
    {
        if(isset($url)){
            return Redirect::intended($url)->with('message', $message);
        } else {
            return Redirect::back()->with('message', $message);
        }
    }

    public static function displayAlert()
    {
        if (Session::has('message')) {
            list($type, $message) = explode('|', Session::get('message'));

            $type = $type == 'error' ? 'danger' : 'success';
            $close = '<button type="button" class="close" data-dismiss="alert">&times;</button>';
            //return sprintf('<div class="alert alert-'.$type.'">%s</div>', $type, $message);
            //return '<div class="alert alert-'.$type.'">'.$message.'</div>';
            return new HtmlString('<div class="alert alert-dismissible alert-'.$type.'">'.$close.$message.'</div>');
        }

        return '';
    }
}
