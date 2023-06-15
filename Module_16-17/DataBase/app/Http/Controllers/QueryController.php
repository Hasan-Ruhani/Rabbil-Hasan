<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Tests\Integration\Database\EloquentMorphCountLazyEagerLoadingTest\Like;

class QueryController extends Controller
{
    function getQuery(){
        // $product = DB::table('products')                //right join
        // -> join('categories', 'products.category_id', '=', 'categories.id')    //here product is parent and caetgories is a child. Now product table category_id relation with categories table id field. Thats result when you click any product then visible this products categories sames like.
        // -> join('brands', 'products.brand_id', '=', 'brands.id')
        // -> select('products.title', 'products.price', 'categories.categoryName', 'brands.brandName')    //here which arguments see you want
        // -> get();  

        // $product = DB::table('products')                          //advanced join
        // -> join('categories', function(JoinClause $clause){
        //     $clause -> on('products.category_id', '=', 'categories.id')
        //     -> where('products.price', '>', 3000);
        // })
        // -> select('products.title', 'products.price')
        // -> get();

        // $query1 = DB::table('products') -> where('products.price', '>', '2000') ;     
        // $query2 = DB::table('products') -> where('products.discount', '>=', '2');     
        // $product = $query1 -> union($query2) -> get();              //union only use same table

        // $product = DB::table('products') -> where('products.title', 'LIKE', '%ca%') -> get();  //this methode use for search
        // $product = DB::table('products') -> where('products.title', 'NOT LIKE', '%ca%') -> get();  //this methode use for search
        
        // $product = DB::table('products') -> whereIn('products.price', [5000, 7000]) -> get();    //whereIn use for search specific value
        // $product = DB::table('products') -> whereNotIn('products.price', [5000, 7000]) -> get();    //whereNoIn inverse whereIn
        // $product = DB::table('products') -> whereBetween('products.price', [5050, 7000]) -> get();    //whereBetween work select in value to value  like (if((mark >= 33) || (mark <= 100)) {echo 'passed'})
        // $product = DB::table('products') -> whereNotBetween('products.price', [5050, 7000]) -> get();    //whereNoBetween inverse whereNotBetween
        // $product = DB::table('products') -> whereNull('products.price') -> get();    //whereNull use for where value is blank
        // $product = DB::table('products') -> whereNotNull('products.price') -> get();    //whereNotNull inverse whereNull
        // $product = DB::table('products') -> whereDate('updated_at', '2023-06-15') -> get();    
        // $product = DB::table('products') -> whereDay('created_at', '15') -> get();   
        // $product = DB::table('products') -> whereColumn('created_at', '<', 'updated_at') -> get();   
        // $product = DB::table('brands') -> orderBy('brandName', 'asc') -> get();   //visible selected value with arranged like A-Z
        // $product = DB::table('brands') -> orderBy('brandName', 'desc') -> get();     //visible selected value with unarranged  like Z-A
        // $product = DB::table('brands') -> inRandomOrder() -> get();     //visible selected value with random  like Z-G, c-o, s-t etc
        // $product = DB::table('brands') -> latest() -> first();     //visible selected value which insert at last
        // $product = DB::table('brands') -> oldest() -> first();     //visible selected value which insert at first

        // $product = DB::table('products') -> groupBy('title') -> having('price', '>', 1000) -> get();   //if you use 'groupBy' so first need ('strict' => false,) that's path 'config/database.php'
        
        $product = DB::table('brands')    //if you want to insert any data in your table
        -> insert([
            'brandName' => 'Toyota',
            'brandImg' => 'https://images.unsplash.com/photo-1620882801951-a7b1521d1dc3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8dG95b3RhJTIwY2FyfGVufDB8fDB8fHww&w=1000&q=80'
        ]);
        

        return $product;
    }
}
