<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
     function login()
     {
          return view('auth.login'); 
     }

     function register()
     {
          return view('auth.register'); 
     }
     
     function checkout()
     {
          return view('auth.checkout'); 
     }
}