<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    function CategoryCreate(Request $request){
        $user_id = $request -> header('id');
        return Category::create([
            'name' => $request -> input('name'),
            'user_id' => $user_id
        ]);
    }

    function CategoryList(Request $request){
        $user_id = $request -> header('id');
        return Category::where('user_id', $user_id)->get();
    }

    function CategoryDelete(Request $request){
        $category_id = $request -> input('id');
        $user_id = $request -> header('id');
        return Category::where('id', $category_id)->where('user_id', $user_id)->delete();
    }

    function CategoryUpdate(Request $request){
        $category_id = $request -> input('id');
        $user_id = $request -> header('id');
        return Category::where('id', $category_id) -> where('user_id', $user_id) -> update([
            'name' => $request->input('name')
        ]);
    }
}
