<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('id', 'name', 'email', 'role', 'created_at')
            ->orderByDesc('created_at')
            ->get();

        return response()->json($users);
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'role' => 'required|in:user,admin,banned',
        ]);

        $user = User::findOrFail($id);

        if ($user->id === Auth::id()) {
            return response()->json(['message' => 'Non puoi modificare il tuo account.'], 403);
        }

        $user->update(['role' => $request->role]);

        return response()->json($user->only('id', 'name', 'email', 'role', 'created_at'));
    }

    public function destroy(int $id)
    {
        $user = User::findOrFail($id);

        if ($user->id === Auth::id()) {
            return response()->json(['message' => 'Non puoi eliminare il tuo account.'], 403);
        }

        $user->delete();

        return response()->json(null, 204);
    }
}
