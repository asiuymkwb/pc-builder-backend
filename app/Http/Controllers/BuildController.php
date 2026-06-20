<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddComponentRequest;
use App\Http\Requests\StoreBuildRequest;
use App\Models\Build;
use App\Models\Component;
use App\Services\BuildService;
use App\Services\CompatibilityService;
use Illuminate\Support\Facades\Auth;

class BuildController extends Controller
{
    public function __construct(
        protected BuildService $buildService,
        protected CompatibilityService $compatibilityService,
    ) {}

    public function index()
    {
        $builds = Auth::user()
            ->builds()
            ->withCount('buildComponents as components_count')
            ->orderByDesc('created_at')
            ->get();

        return response()->json($builds);
    }

    public function store(StoreBuildRequest $request)
    {
        $build = Build::create([
            'user_id' => Auth::id(),
            'name'    => $request->name,
        ]);

        return response()->json($build, 201);
    }

    public function show(string $id)
    {
        $build = Build::with(['components.specs', 'components.category'])
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return response()->json($build);
    }

    public function update(StoreBuildRequest $request, string $id)
    {
        $build = Build::where('user_id', Auth::id())->findOrFail($id);

        $build->update($request->validated());

        return response()->json($build);
    }

    public function destroy(string $id)
    {
        $build = Build::where('user_id', Auth::id())->findOrFail($id);
        $build->delete();

        return response()->json(['message' => 'Build eliminata.']);
    }

    public function addComponent(AddComponentRequest $request, string $id)
    {
        $build        = Build::where('user_id', Auth::id())->findOrFail($id);
        $quantity     = $request->quantity ?? 1;
        $newComponent = Component::with('category')->findOrFail($request->component_id);

        // un componente per categoria
        $build->buildComponents()
            ->whereIn('component_id', function ($query) use ($newComponent) {
                $query->select('id')
                    ->from('components')
                    ->where('category_id', $newComponent->category_id);
            })
            ->delete();

        $existing = $build->buildComponents()
            ->where('component_id', $request->component_id)
            ->first();

        if ($existing) {
            $existing->update(['quantity' => $quantity]);
        } else {
            $build->buildComponents()->create([
                'component_id' => $request->component_id,
                'quantity'     => $quantity,
            ]);
        }

        $this->buildService->recalculate($build);

        $build->load('components.specs', 'components.category');
        $compatibility = $this->compatibilityService->check($build);

        return response()->json([
            'build'         => $build,
            'compatibility' => $compatibility,
        ]);
    }

    public function removeComponent(string $id, string $componentId)
    {
        $build = Build::where('user_id', Auth::id())->findOrFail($id);

        $build->buildComponents()->where('component_id', $componentId)->delete();

        $this->buildService->recalculate($build);

        $build->load('components.specs', 'components.category');

        return response()->json($build);
    }
}