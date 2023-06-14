<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    function getQuery(){
        // $product = DB::table('products')                //right join
        // -> join('categories', 'products.category_id', '=', 'categories.id')    //here product is parent and caetgories is a child. Now product table category_id relation with categories table id field. Thats result when you click any product then visible this products categories sames like.
        // -> join('brands', 'products.brand_id', '=', 'brands.id')
        // -> select('products.title', 'products.price', 'categories.categoryName', 'brands.brandName')    //here which arguments see you want
        // -> get();  

        $product = DB::table('products')                          //advanced join
        -> join('categories', function(JoinClause $clause){
            $clause -> on('products.category_id', '=', 'categories.id')
            -> where('products.price', '>', 3000);
        })
        -> select('products.title', 'products.price')
        -> get();
        return $product;
    }
}
