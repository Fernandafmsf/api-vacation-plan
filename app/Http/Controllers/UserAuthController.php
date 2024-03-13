<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    //

    public function register(UserRequest $request): \Illuminate\Http\JsonResponse
    {
        //checking fields 
        $registerData = $request->validated();

        //creating user
        $user = User::create([
            'name' => $registerData['name'],
            'email' => $registerData['email'],
            'password' => Hash::make($registerData['password']),
        ]);

        return response()->json([
            'message' => 'User Created ',
        ]);
    }

    public function login(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        //checking fields
        $loginData = $request->validated();

        $user = User::where('email', $loginData['email'])->first();
        if (!$user || !Hash::check($loginData['password'], $user->password)) 
        {

            return response()->json([
                'message' => 'Invalid Credentials'
            ], 401);

        }

        $token = $user->createToken($user->name . '-AuthToken')->plainTextToken;
        return response()->json([
            'access_token' => $token,
        ]);
    }

}
