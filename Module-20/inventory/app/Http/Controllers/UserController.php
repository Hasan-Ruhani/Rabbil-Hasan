<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Helper\JWTToken;
use Illuminate\Support\Facades\Mail;
use App\Mail\OTPEmail;

class UserController extends Controller
{
    function UserLogin(Request $request){
        $res = User::where($request->input())->count();
        if($res == 1){
            $token = JWTToken::CreateToken($request->input('email'));
            return response()->json(['msg' => "success", 'data' => $token]);
        }
        else{
            return response()->json(['msg' => "fail", 'data' => "unauthorized"]);
        }
    }

    function UserRegistration(Request $request){
        return User::create($request->input());
    }

    function SendOTPToEmail(Request $request){
        $UserEmail = $request->input('email');
        $otp = rand(100000, 999999);
        $res = User::where($request->input()) -> count();
        if($res == 1){
            Mail::to($UserEmail) -> send(new OTPEmail($otp));
            $res = User::where($request -> input()) -> update(['otp' => $otp]);
            return response() -> json(['msg' => "success", 'data' => 'OTP send to your email']);
        }
        else{
            return response() -> json(['msg' => "fail", 'data' => 'unauthorized']);
        }
    }
    
    function OTPVerify(Request $request){
        $res = User::where($request->input()) -> count();
        if($res == 1){
            $res = User::where($request -> input()) -> update(['otp' => 0]);
            return response() -> json(['msg' => "success", 'data' => 'Verified']);
        }
        else{
            return response() -> json(['msg' => "fail", 'data' => 'unauthorized']);
        }
    }

    function SetPaeeword(Request $request){
        User::where($request -> input()) -> update(['password' => $request -> input('password')]);
        return response() -> json(['msg' => "success", 'data' => 'Updated']);
    }

    function ProfileUpdate(Request $request){
        
    }
}
