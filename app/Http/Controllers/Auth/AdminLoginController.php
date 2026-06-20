<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function store(LoginRequest $request)
    {
        if (!Auth::attempt($request->validated())) {
            return response()->json(['message' => 'Credenziali non valide.'], 401);
        }

        $user = Auth::user();

        if (!$user->isAdmin()) {
            Auth::logout(); // invalida la sessione creata da attempt() prima di rispondere
            return response()->json(['message' => 'Accesso non autorizzato.'], 403);
        }

        $token = $user->createToken('admin_token')->plainTextToken;

        return response()->json([
            'user'  => ['id' => $user->id, 'name' => $user->name, 'email' => $user->email, 'role' => $user->role],
            'token' => $token,
        ]);
    }
}
