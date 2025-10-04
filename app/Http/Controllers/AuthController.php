<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);

            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
                'role' => 'manager', // Default role
                'has_access' => false, // Default access
            ]);

            return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Registration failed', 'details' => $e->getMessage()], 500);
        }
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if (!$user->has_access) {
                Auth::logout();
                return response()->json([
                    'error' => 'Access denied. Please contact the administrator.'
                ], 403);
            }

            // Make sure the User model uses HasApiTokens (for Sanctum)
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'message' => 'Login successful',
                'token' => $token,
                'token_type' => 'Bearer',
                'user' => $user
            ]);
        }

        return response()->json([
            'error' => 'Invalid credentials'
        ], 401);
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            // Revoke all tokens...
            $user->tokens()->delete();

            Auth::logout();
            return response()->json(['message' => 'Logged out successfully']);
        }

        return response()->json(['error' => 'No authenticated user'], 401);
    }

    public function me(Request $request)
    {
        $user = auth()->user();
        if ($user) {
            return response()->json(['user' => $user]);
        }

        return response()->json(['error' => 'No authenticated user'], 401);
    }

    public function grantAccess($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->has_access = $user->has_access ? false : true;
        $user->save();

        return response()->json(['message' => 'Access toggled', 'user' => $user]);
    }

    public function listUsers()
    {
        $users = User::all();
        return response()->json(['users' => $users]);
    }

}
