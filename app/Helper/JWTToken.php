<?php
namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken
{
    private static function getJWTKey()
    {
        $envKey = env('JWT_SECRET');

        if (!$envKey) {
            throw new Exception('JWT_SECRET is not set in .env');
        }

        return str_starts_with($envKey, 'base64:')
            ? base64_decode(substr($envKey, 7))
            : $envKey;
    }

    public static function CreateToken($userEmail, $userId)
    {
        $key = self::getJWTKey();

        $payload = [
            'iss' => 'Laravel_token',
            'iat' => time(),
            'exp' => time() + 60 * 24,
            'userEmail' => $userEmail,
            'userId' => $userId,
        ];

        return JWT::encode($payload, $key, 'HS256');
    }

    public static function VerifyToken($headerToken)
    {
        try {
            if ($headerToken === null) {
                return "unauthorize";
            }

            $key = self::getJWTKey();
            $decoded = JWT::decode($headerToken, new Key($key, 'HS256'));

            return $decoded;
        } catch (Exception $e) {
            return "unauthorize";
        }
    }

    public static function CreateTokenForSetPassword($userEmail, $userId)
    {
        $key = self::getJWTKey();

        $payload = [
            'iss' => 'Laravel_token',
            'iat' => time(),
            'exp' => time() + 60,
            'userEmail' => $userEmail,
            'userId' => $userId,
        ];

        return JWT::encode($payload, $key, 'HS256');
    }
}
?>