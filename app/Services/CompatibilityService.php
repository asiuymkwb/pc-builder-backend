<?php

namespace App\Services;

use App\Models\Build;
use App\Models\CompatibilityRule;

class CompatibilityService
{
    public function check(Build $build): array
    {
        $build->load('components.specs', 'components.category');

        $byCategory = [];
        foreach ($build->components as $component) {
            $byCategory[$component->category->slug] = $component;
        }

        $errors   = [];
        $warnings = [];

        foreach (CompatibilityRule::all() as $rule) {
            $componentA = $byCategory[$rule->category_a] ?? null;
            $specA      = $componentA?->spec($rule->spec_key_a);

            // margine 20% sul wattaggio totale
            if ($rule->category_b === 'build') {
                $specB = $build->total_wattage * 1.2;
            } else {
                $componentB = $byCategory[$rule->category_b] ?? null;
                $specB      = $componentB?->spec($rule->spec_key_b);
            }

            if ($specA === null || $specB === null) {
                continue;
            }

            if (!$this->evaluate($rule->operator, $specA, $specB)) {
                $item = ['rule' => $rule->rule_name, 'message' => $rule->message];

                if ($rule->is_blocking) {
                    $errors[] = $item;
                } else {
                    $warnings[] = $item;
                }
            }
        }

        return [
            'is_compatible' => empty($errors),
            'errors'        => $errors,
            'warnings'      => $warnings,
        ];
    }

    private function evaluate(string $operator, $a, $b): bool
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
