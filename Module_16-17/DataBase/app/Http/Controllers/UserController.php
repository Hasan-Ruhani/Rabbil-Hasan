<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function getUser(Request $request){                    
        $insert = DB::table('brands') -> insert([              //when you need user input then you use this method
            'brandName' => $request -> input('name'),
            'brandImg' => $request -> input('img')
        ]);
        return $insert;

        // $update = DB::table('products') -> where('id', '=', $request -> input('id')) -> update([    //when you wnat to update your table 
        //     'title' => $request -> input('title'),
        //     'price' => $request -> input('price'),
        //     'image' => $request -> input('img')
        // ]);
        // return $update;

        // $replaceOrInsert = DB::table('products')   //this method doesn't fully work, this only work update not replace/insert - this is my lack
        // ->updateOrInsert(
        // [
        //     'title' => $request->title
        // ],
        // [
        //     'price' => $request->input('price'),
        //     'image' => $request->input('img')
        // ]);
        // return $replaceOrInsert;
        
        // $increment = DB::table('products') -> where('id', '=', $request -> input('id'))   //when  you wnat to increment your value
        // -> increment('price', 2);
        // // -> decrement('price', 2);
        // return $increment;
        
        // $delete = DB::table('brands') -> where('id', '=', $request -> input('id')) -> delete();
        // return $delete;

    }
}
