<?php

use App\Models\Client;

if(!function_exists('generate_avatar')){
    function generate_avatar($name): string
    {
        return "https://ui-avatars.com/api/?name=$name&background=0D8ABC&color=fff";
    }
}

if(!function_exists('fullName')){
    function fullName(): string
    {
        return  auth()->user()->name;
    }
}