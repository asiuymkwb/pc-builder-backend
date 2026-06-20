<?php

namespace App\Http\Controllers;

use App\Models\Build;
use App\Services\CompatibilityService;
use Illuminate\Support\Facades\Auth;

class CompatibilityController extends Controller
{
    public function __construct(protected CompatibilityService $compatibilityService) {}

    public function check(string $buildId)
    {
        $build = Build::where('user_id', Auth::id())->findOrFail($buildId);

        $result = $this->compatibilityService->check($build);

        return response()->json($result);
    }
}

