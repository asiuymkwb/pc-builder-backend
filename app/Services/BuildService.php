<?php

namespace App\Services;

use App\Models\Build;

class BuildService
{
    public function recalculate(Build $build): void
    {
        $build->load('components');

        $totalPrice    = 0;
        $totalWattage  = 0;

        foreach ($build->components as $component) {
            $quantity      = $component->pivot->quantity;
            $totalPrice   += $component->price * $quantity;
            $totalWattage += $component->wattage * $quantity;
        }

        // +10% per sicurezza
        $totalWattage = (int) round($totalWattage * 1.1);

        $build->update([
            'total_price'    => $totalPrice,
            'total_wattage'  => $totalWattage,
        ]);
    }
}
