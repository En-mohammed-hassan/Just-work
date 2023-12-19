<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Appcontroller extends Controller
{
    function login (){
        return view("layout.login") ;
    }
    function register (){
        return view("layout.register") ;
    }

}
