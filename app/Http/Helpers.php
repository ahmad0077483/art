<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;


if(! function_exists('isUrl') ) {

    function isUrl($url , $activeClassName = 'active') {
        return \request()->fullUrlIs($url) ? $activeClassName : '';
    }

}
