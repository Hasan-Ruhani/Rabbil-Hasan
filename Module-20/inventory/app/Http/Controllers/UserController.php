<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function UserLogin(Request $request){
        return "login";
    }

    function UserRegistration(Request $request){
        return User::create($request->input());
    }

    function SendOTPToEmail(Request $request){

    }
    
    function OTPVerify(Request $request){
        
    }

    function SetPaeeword(Request $request){
        
    }

    function ProfileUpdate(Request $request){
        
    }
}
