<?php 
namespace App\Helper;

use Exception;
use Firebase\JWT\key;
use Firebase\JWT\JWT;
use FFI\Exception;
class JWTToken{
    public static function CreateToken($userID):string{
        $key = env('JWT_KEY');                // JWT_KEY inside the .env file
        $payload = [
            'iss' => "Laravel-jwt",
            'ist' => time(),
            'exp' => time() + 60*60,
            'user' => $userID
        ];
        return JWT::encode($payload, $key, 'HS256');
    }

    public static function DecodeToken($token){
        try{
            $decoded = JWT::decode($token, new key($key, 'HS256'));
            return $decoded->userID;
        }
        catch(Exception $e){
            return 'unauthorize';
        }
       
    }
}