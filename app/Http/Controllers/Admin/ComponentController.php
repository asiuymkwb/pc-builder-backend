<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComponentController extends Controller
{
    public function index(Request $request)
    {
        $query = Component::with(['category', 'specs']);

        if ($request->filled('category')) {
            $query->whereHas('category', fn($q) => $q->where('slug', $request->category));
        }

        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        return response()->json($query->paginate(15));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'name'        => ['required', 'string', 'max:255'],
            'brand'       => ['required', 'string', 'max:100'],
            'model'       => ['required', 'string', 'max:150'],
            'price'       => ['required', 'numeric', 'min:0'],
            'wattage'     => ['required', 'integer', 'min:0'],
            'image_url'   => ['nullable', 'string'],
            'buy_url'     => ['nullable', 'string'],
            'stock'       => ['boolean'],
            'specs'       => ['sometimes', 'array'],
            'specs.*.spec_key'   => ['required_with:specs', 'string'],
            'specs.*.spec_value' => ['required_with:specs', 'string'],
        ]);

        $component = DB::transaction(function () use ($request) {
            $component = Component::create($request->only([
                'category_id', 'name', 'brand', 'model',
                'price', 'wattage', 'image_url', 'buy_url', 'stock',
            ]));

            if ($request->filled('specs')) {
                $component->specs()->createMany($request->specs);
            }

            return $component;
        });

        return response()->json($component->load(['category', 'specs']), 201);
    }

    public function show(string $id)
    {
        $component = Component::with(['category', 'specs'])->findOrFail($id);

        return response()->json($component);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'      => ['sometimes', 'string', 'max:255'],
            'brand'     => ['sometimes', 'string', 'max:100'],
            'model'     => ['sometimes', 'string', 'max:150'],
            'price'     => ['sometimes', 'numeric', 'min:0'],
            'wattage'   => ['sometimes', 'integer', 'min:0'],
            'image_url' => ['nullable', 'string'],
            'buy_url'   => ['nullable', 'string'],
            'stock'     => ['boolean'],
            'specs'     => ['sometimes', 'array'],
            'specs.*.spec_key'   => ['required_with:specs', 'string'],
            'specs.*.spec_value' => ['required_with:specs', 'string'],
        ]);

        $component = Component::findOrFail($id);

        DB::transaction(function () use ($request, $component) {
            $component->update($request->only([
                'name', 'brand', 'model', 'price',
                'wattage', 'image_url', 'buy_url', 'stock',
            ]));

            if ($request->has('specs')) {
                $component->specs()->delete();
                $component->specs()->createMany($request->specs);
            }
        });

        return response()->json($component->load(['category', 'specs']));
    }

    public function destroy(string $id)
    {
        $component = Component::findOrFail($id);
        $component->update(['is_active' => false]);

        return response()->json(['message' => 'Componente eliminato.']);
    }
}

