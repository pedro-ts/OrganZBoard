<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    /**
     * Create a new class instance.
     */
    public function __construct() {}

    public function login(string $email, string $password, string $deviceName = "api"): array {
        $user = User::query()
            ->where('email', $email)
            ->first();

        if(!$user || ! Hash::check($password, $user->password)){
            throw ValidationException::withMessages([
                'email' => ['As credenciais informadas são inválidas.']
            ]);
        }

        $token = $user->createToken($deviceName)
        ->plainTextToken;

        return [
            'user' => $user,
            'token' => $token
        ];
    }
}
