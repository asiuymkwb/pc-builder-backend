<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function store(LoginRequest $request)
    {
        if (!Auth::attempt($request->validated())) {
            return response()->json(['message' => 'Credenziali non valide.'], 401);
        }

        $user = Auth::user();

        if ($user->role === 'banned') {
            Auth::logout();
            return response()->json(['message' => 'Account sospeso. Contatta il supporto.'], 403);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user'  => ['id' => $user->id, 'name' => $user->name, 'email' => $user->email, 'role' => $user->role],
            'token' => $token,
        ]);
    }

    public function destroy()
    {
        Auth::user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logout effettuato.']);
    }

    public function me()
    {
        $user = Auth::user();

        return response()->json([
            'id'    => $user->id,
            'name'  => $user->name,
            'email' => $user->email,
            'role'  => $user->role,
        ]);
    }
}
