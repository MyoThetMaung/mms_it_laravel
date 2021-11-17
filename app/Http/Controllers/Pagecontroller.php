<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pagecontroller extends Controller
{
    public function c($aa){
        return "this is $aa in c function";
    }

    public function detail($id){
        $name = 'saimon';
        return view("detail",compact('id','name'));                                 //data sharing is writing with string value
    }

  
}
