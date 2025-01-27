<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return response()->json([
            'error' => false,
            'message' => 'Register success',
            'status' => 201,
            'user' => $user
        ], Response::HTTP_CREATED);

    }
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return response()->json([
                'error' => false,
                'message' => 'Login success',
                'status' => 200,
                'user' => Auth::user()
            ], Response::HTTP_OK);
        }
        return response()->json([
            'message' => 'Login failed',
            'status' => 401
        ], Response::HTTP_UNAUTHORIZED);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json([
            'error' => false,
            'message' => 'Logout success',
            'status' => 200
        ], Response::HTTP_OK);
    }

    public function user() {
        if(Auth::check()) {
            return response()->json([
                'error' => false,
                'message' => 'User is logged in',
                'status' => 200,
                'user' => Auth::user()
            ], Response::HTTP_OK);
        }
        return response()->json([
            'error' => true,
            'message' => 'User is not logged in',
            'status' => 401
        ], Response::HTTP_UNAUTHORIZED);
    }
}
