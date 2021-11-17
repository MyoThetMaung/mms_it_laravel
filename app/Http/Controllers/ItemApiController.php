<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Item;
use Illuminate\Support\Facades\Validator;

class ItemApiController extends Controller
{
   public function index(){
       $item = Item::all();
       return response($item,200);
   }

   public function show($id){
       $item = Item::find($id);
       return response($item,200);
   }

   public function store(Request $request){
        $validator = Validator::make($request->all(),[                              //api validation
            'name' => 'required|min:3|max:30',
            'price' => 'required|integer|min:2|max:100',    
            'stock' => 'required|integer|min:2|max:100'
        ]);

        if($validator->fails()){
            return response($validator->errors(),400);
        }

        $item = new Item();
        $item -> name = $request -> name;
        $item -> price = $request -> price;
        $item -> stock = $request -> stock;
        $item -> save();

        return response($request,200);
   }
}
