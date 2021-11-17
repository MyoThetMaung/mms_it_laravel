<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class Formcontroller extends Controller
{
    
    public function __construct()
    {
        // $this-> middleware('auth')->except(['create','store']);          //protecting all except 'create' and 'store'
        $this->middleware('isMe')->only(['create']);                      //protecting only 'create' route in 'isMe controller'
    }

    public function create(){
        return view('request_response.form');
    }

    public function store (Request $request){
        $request->validate([
            'name' => 'required|min:3|max:30',
            'price' => 'required|integer|min:2|max:100',    
            'stock' => 'required|integer|min:2|max:100'
        ]);
        
        $item = new Item();
        $item -> name = $request -> name;
        $item -> price = $request -> price;        
        $item -> stock = $request -> stock;
        $item -> save();

        return redirect()->route('form.create')->with('status',$request->name." is added");
    }

    public function delete($id){
        $currentItem = Item::find($id);
        $currentItem_name = $currentItem->name;
        $currentItem->delete();
        return redirect()->route('form.create')->with('delete',$currentItem_name. " is deleted");
    }

    
        // $name = $request->name;
        // $price = $request->price;
        // $stock = $request-> stock;
        // $data = "name is $name and price is $price and stock in $stock";
        // return redirect()->route('form.create')->with('data',$data);                //return with data 

        // return view('request_response.response')                                     //normal return view file

    
}
