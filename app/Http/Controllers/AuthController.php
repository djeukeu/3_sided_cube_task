<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginPostRequest;
use App\Http\Requests\RegisterPostRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public const TOKEN_NAME = 'TOKEN_NAME';

    public function register(RegisterPostRequest $request)
    {
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
        ]);

        $token = $user->createToken(AuthController::TOKEN_NAME)->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ], 201);
    }

    public function login(LoginPostRequest $request)
    {
        $user = User::where([
            "email" => $request->email,
        ])->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Wrong credentials',
            ], 401);
        }

        $token = $user->createToken(AuthController::TOKEN_NAME)->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ], 200);
    }
}
