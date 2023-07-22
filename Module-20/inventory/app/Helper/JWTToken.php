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

    public static function DecodeToken($token){
        try{
            $key = env('JWT_KEY');                // JWT_KEY inside the .env file
            $decoded = JWT::decode($token, new key($key, 'HS256'));
            return $decoded->userEmail;
        }
        catch(Exception $e){
            return 'unauthorize';
        }
       
    }
}