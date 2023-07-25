<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Helper\JWTToken;
use Illuminate\Support\Facades\Mail;
use App\Mail\OTPEmail;
use Exception;

class UserController extends Controller
{
    function LoginPage(){
        return view('pages.auth.login-page');
    }

    function RegistrationPage(){
        return view('pages.auth.registration-page');
    }

    function SendOtpPage(){
        return view('pages.auth.send-otp-page');
    }

    function VerifyOTPPage(){
        return view('pages.auth.verify-otp-page');
    }

    function ResetPasswordPage(){
        return view('pages.auth.reset-pass-page');
    }

    function ProfilePage(){
        return view('pages.dashboard.profile-page.');
    }




    function UserLogin(Request $request){
        $res = User::where($request->input())->count();
        if($res == 1){
            $token = JWTToken::CreateToken($request->input('email'));
            return response()->json([
                'status' => "success",
                'message' => "User login successful"
            ], 200) -> cookie('token', $token, 60*60*24);
        }
        else{
            return response()->json(['msg' => "fail", 'data' => "unauthorized"], 401);
        }
    }

    function UserRegistration(Request $request){
        try{
            User::create([
                'firstName' => $request -> input('firstName'),
                'lastName' => $request -> input('lastName'),
                'email' => $request -> input('email'),
                'mobile' => $request -> input('mobile'),
                'password' => $request -> input('password')
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'User Registration Successful'
            ], 200);
        }
        catch(Exception $e){
            return response()->json([
                'status' => 'Failed',
                'message' => 'User Registration Failed'
            ], 400);
            
        }
         
    }

    function SendOTPCode(Request $request){
        $UserEmail = $request->input('email');
        $otp = rand(10000, 99999);
        $res = User::where($request->input()) -> count();
        if($res == 1){
            Mail::to($UserEmail) -> send(new OTPEmail($otp));
            $res = User::where($request -> input()) -> update(['otp' => $otp]);
            return response() -> json(['msg' => "success", 'data' => 'OTP send to your email'], 200);
        }
        else{
            return response() -> json(['msg' => "fail", 'data' => 'unauthorized'], 401);
        }
    }
    
    function VerifyOTP(Request $request){
        $email=$request->input('email');
        $otp=$request->input('otp');
        $count=User::where('email','=',$email)
            ->where('otp','=',$otp)->count();
        if($count==1){
            // Database OTP Update
            User::where('email','=',$email)->update(['otp'=>'0']);

            // Pass Reset Token Issue
            $token=JWTToken::CreateTokenForSetPassword($request->input('email'));

            return response()->json([
                'status' => 'success',
                'message' => 'OTP Verification Successful',
            ],200)->cookie('token',$token,60*60*24);
        }
        else{
            return response()->json([
                'status' => 'failed',
                'message' => 'unauthorized'
            ],401);
        }
    }

    function ResetPassword(Request $request){
        User::where($request -> input()) -> update(['password' => $request -> input('password')]);
        return response() -> json(['msg' => "success", 'data' => 'Updated']);
    }

    function ProfileUpdate(Request $request){
        
    }
}
