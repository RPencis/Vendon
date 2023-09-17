<?php

namespace App\Controllers;

class BaseController
{
    public function  Redirect($url, $permanent = false)
    {
        header('Location: ' . $url, true, $permanent ? 301 : 302);

        exit();
    }
}
