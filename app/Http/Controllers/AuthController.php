<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
     // Login dengan username dan password
     public function loginWithUsername(Request $request)
     {
         $request->validate([
             'username' => 'required|string',
             'password' => 'required|string',
         ]);

         $credentials = $request->only('username', 'password');

         if (!$token = JWTAuth::attempt($credentials)) {
             return response()->json([
                'message' => 'Username dan Password salah!',
                'status' => 0,
                ]
            );
         }

         return response()->json([
             'message' => 'Login successful',
             'status' => 1,
             'token' => $token,
             'user' => Auth::user(),
         ]);
     }

     // Login dengan token
     public function loginWithToken(Request $request)
     {
         $request->validate([
             'token' => 'required|string',
         ]);
        //  \Log::info('Token received: ' . $request->token);


        try {
            $user = JWTAuth::setToken($request->token)->authenticate();
            if (!$user) {
                return response()->json([
                    'message' => 'Token in Expired',
                    'status' => 0,
                ]);
            }
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json([
                'message' => 'Token in Expired',
                'status' => 0,
            ]);
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json([
                'message' => 'Token in Expired',
                'status' => 0,
            ]);
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json([
                'message' => 'Token in Expired',
                'status' => 0,
            ]);
        }


        return response()->json([
            'message' => 'Login successful',
            'status' => 1,
            'user' => $user,
        ]);
     }

     public function logout()
     {
         Auth::logout();
         return response()->json(['message' => 'Successfully logged out']);
     }

     public function me()
     {
         return response()->json(Auth::user());
     }
}
