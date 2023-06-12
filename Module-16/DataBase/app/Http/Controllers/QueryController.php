<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    function getQuery(){
        $product = DB::table('producrs') -> get();
        return $product;
    }
}
