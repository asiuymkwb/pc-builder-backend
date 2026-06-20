<?php

namespace App\Http\Controllers;

use App\Models\Build;
use App\Models\Component;
use App\Models\CompatibilityRule;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
    public function index(Request $request)
    {
        $query = Component::with(['category', 'specs'])
            ->where('is_active', true);

        if ($request->filled('category')) {
            $query->whereHas('category', fn($q) => $q->where('slug', $request->category));
        }

        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->filled('compatible_with_build') && $request->filled('category')) {
            $user = auth('sanctum')->user();

            if ($user) {
                $build = Build::with('components.specs', 'components.category')
                    ->where('user_id', $user->id)
                    ->find($request->compatible_with_build);

                if ($build) {
                    $components = $query->get();
                    $filtered   = $this->filterCompatible($components, $build, $request->category);

                    return response()->json($filtered->values());
                }
            }
        }

        return response()->json($query->get());
    }

    public function show(string $id)
    {
        $component = Component::with(['category', 'specs'])->findOrFail($id);

        return response()->json($component);
    }

    // Filtra i componenti compatibili con la build per la categoria sfogliata
    private function filterCompatible(\Illuminate\Support\Collection $components, Build $build, string $browsedSlug)
    {
        // Mappa slug categoria => componente già nella build
        $byCategory = $build->components->keyBy(fn($c) => $c->category->slug);

        // Carica solo le regole bloccanti (errori, non warning)
        $rules = CompatibilityRule::where('is_blocking', true)->get();

        return $components->filter(function (Component $candidate) use ($byCategory, $rules, $browsedSlug, $build) {
            foreach ($rules as $rule) {
                // Caso A: il candidato è in category_a, l'altro componente è nella build
                if ($rule->category_a === $browsedSlug) {
                    $specA = $candidate->spec($rule->spec_key_a);

                    // Caso speciale R3: category_b = 'build' (confronto con total_wattage)
                    if ($rule->category_b === 'build') {
                        $specB = $build->total_wattage * 1.2;
                    } else {
                        $refComp = $byCategory[$rule->category_b] ?? null;
                        if (!$refComp) continue; // L'altro componente non è in build → skip
                        $specB = $refComp->spec($rule->spec_key_b);
                    }

                    if ($specA === null || $specB === null) continue;

                    if (!$this->evaluate($rule->operator, $specA, $specB)) {
                        return false; // Incompatibile → scartato
                    }
                }

                // Caso B: il candidato è in category_b, category_a è nella build
                if ($rule->category_b === $browsedSlug && $rule->category_b !== 'build') {
                    $refComp = $byCategory[$rule->category_a] ?? null;
                    if (!$refComp) continue;

                    $specA = $refComp->spec($rule->spec_key_a);
                    $specB = $candidate->spec($rule->spec_key_b);

                    if ($specA === null || $specB === null) continue;

                    if (!$this->evaluate($rule->operator, $specA, $specB)) {
                        return false; // Incompatibile → scartato
                    }
                }
            }

            return true; // Supera tutti i controlli → compatibile
        });
    }

    private function evaluate(string $operator, mixed $a, mixed $b): bool
    {
        return match ($operator) {
            'equals'     => (string) $a === (string) $b,
            'not_equals' => (string) $a !== (string) $b,
            'contains'   => str_contains((string) $a, (string) $b),
            'gte'        => (float) $a >= (float) $b,
            'lte'        => (float) $a <= (float) $b,
            default      => true,
        };
    }
}