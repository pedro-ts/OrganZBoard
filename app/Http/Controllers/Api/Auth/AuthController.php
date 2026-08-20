<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(private readonly AuthService $authService){}
    public function login(LoginRequest $request): JsonResponse{
        $result = $this->authService->login(
            email: $request->validated('email'),
            password: $request->validated('password'),
            deviceName: $request->validated('device_name', "default"));

        return response()->json(
            [
                'message' => 'login realizado com sucesso!',

                'data' => [
                    'user' => new UserResource($result['user']),
                    'token' => $result['token']
                ]
            ]
        );
    }

    public function logout(Request $request): JsonResponse{
        $request->user()
            ->currentAccessToken()
            ->delete();

        return response()->json([
            'message' => 'Logout realizado com sucesso.',
        ]);
    }
}
