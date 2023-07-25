<?php 
namespace App\Helper;

use Firebase\JWT\key;
use Firebase\JWT\JWT;
use Exception;

class JWTToken{
    public static function CreateToken($userEmail):string{
        $key = env('JWT_KEY');                // JWT_KEY inside the .env file
        $payload = [
            'iss' => "Laravel-jwt",
            'ist' => time(),
            'exp' => time() + 60*60,
            'userEmail' => $userEmail
        ];
        return JWT::encode($payload, $key, 'HS256');
    }

    public static function CreateTokenForSetPassword($userEmail):string{
        $key = env('JWT_KEY');                // JWT_KEY inside the .env file
        $payload = [
            'iss' => "Laravel-jwt",
            'ist' => time(),
            'exp' => time() + 60*60,
            'userEmail' => $userEmail
        ];
        return JWT::encode($payload, $key, 'HS256');
    }

    public static function VerifyToken($token):object|string
    {
        try {
            if($token==null){
                return 'unauthorized';
            }
            else{
                $key =env('JWT_KEY');
                $decode=JWT::decode($token,new Key($key,'HS256'));
                return $decode;
            }
        }
        catch (Exception $e){
            return 'unauthorized';
        }
    }
}