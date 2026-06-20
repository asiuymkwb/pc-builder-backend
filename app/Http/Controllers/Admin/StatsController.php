<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Build;
use App\Models\BuildComponent;
use App\Models\Component;
use App\Models\User;

class StatsController extends Controller
{
    public function index()
    {
        $totalComponents = Component::where('is_active', true)->count();

        $buildsToday = Build::whereDate('created_at', today())->count();

        $totalUsers = User::where('role', 'user')->count();

        // Componente più aggiunto nelle build
        $mostUsed = BuildComponent::select('component_id')
            ->selectRaw('SUM(quantity) as total_quantity')
            ->groupBy('component_id')
            ->orderByDesc('total_quantity')
            ->with('component:id,name,brand')
            ->first();

        return response()->json([
            'total_components' => $totalComponents,
            'builds_today'     => $buildsToday,
            'total_users'      => $totalUsers,
            'most_used_component' => $mostUsed?->component,
        ]);
    }
}
