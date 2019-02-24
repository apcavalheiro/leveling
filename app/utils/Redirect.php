<?php

namespace App\Utils;

use App\Utils\Session;

class Redirect
{
    public static function route($path, $session = [])
    {
        if (count($session) > 0) {
            foreach ($session as $key => $value) {
                Session::setSession($key, $value);
            }
        }
        return header("location:$path");
    }
}