<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{
    function index(){
        return view('backend.index');
    }

    
}
