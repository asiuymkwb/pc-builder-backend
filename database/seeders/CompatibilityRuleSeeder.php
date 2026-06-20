<?php

namespace Database\Seeders;

use App\Models\CompatibilityRule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompatibilityRuleSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $rules = [
            // --- Regole bloccanti ---
            [
                'rule_name'  => 'R1',
                'category_a' => 'cpu',
                'spec_key_a' => 'socket',
                'category_b' => 'motherboard',
                'spec_key_b' => 'socket',
                'operator'   => 'equals',
                'is_blocking'=> true,
                'message'    => 'Il socket della CPU non è compatibile con il socket della scheda madre.',
            ],
            [
                'rule_name'  => 'R2',
                'category_a' => 'ram',
                'spec_key_a' => 'ddr_gen',
                'category_b' => 'motherboard',
                'spec_key_b' => 'ddr_gen',
                'operator'   => 'equals',
                'is_blocking'=> true,
                'message'    => 'La generazione RAM non è compatibile con la scheda madre.',
            ],
            [
                'rule_name'  => 'R3',
                'category_a' => 'psu',
                'spec_key_a' => 'wattage_max',
                'category_b' => 'build',
                'spec_key_b' => 'total_wattage',
                'operator'   => 'gte',
                'is_blocking'=> true,
                'message'    => 'L\'alimentatore non ha potenza sufficiente per questa configurazione (margine 20% richiesto).',
            ],
            [
                'rule_name'  => 'R4',
                'category_a' => 'case',
                'spec_key_a' => 'form_factor',
                'category_b' => 'motherboard',
                'spec_key_b' => 'form_factor',
                'operator'   => 'contains',
                'is_blocking'=> true,
                'message'    => 'Il case non supporta il form factor della scheda madre.',
            ],
            [
                'rule_name'  => 'R5',
                'category_a' => 'case',
                'spec_key_a' => 'max_gpu_length_mm',
                'category_b' => 'gpu',
                'spec_key_b' => 'length_mm',
                'operator'   => 'gte',
                'is_blocking'=> true,
                'message'    => 'La GPU è troppo lunga per il case selezionato.',
            ],
            [
                'rule_name'  => 'R6',
                'category_a' => 'cpu-cooler',
                'spec_key_a' => 'socket_compat',
                'category_b' => 'cpu',
                'spec_key_b' => 'socket',
                'operator'   => 'contains',
                'is_blocking'=> true,
                'message'    => 'Il dissipatore non è compatibile con il socket della CPU.',
            ],
            [
                'rule_name'  => 'R7',
                'category_a' => 'case',
                'spec_key_a' => 'max_cooler_height_mm',
                'category_b' => 'cpu-cooler',
                'spec_key_b' => 'height_mm',
                'operator'   => 'gte',
                'is_blocking'=> true,
                'message'    => 'Il dissipatore è troppo alto per il case selezionato.',
            ],

            // --- Warning (non bloccanti) ---
            [
                'rule_name'  => 'W1',
                'category_a' => 'ram',
                'spec_key_a' => 'speed_mhz',
                'category_b' => 'cpu',
                'spec_key_b' => 'max_ram_speed',
                'operator'   => 'lte',
                'is_blocking'=> false,
                'message'    => 'La RAM è più veloce del massimo supportato dalla CPU: funzionerà alla velocità della CPU.',
            ],
            [
                'rule_name'  => 'W2',
                'category_a' => 'cpu-cooler',
                'spec_key_a' => 'max_tdp',
                'category_b' => 'cpu',
                'spec_key_b' => 'tdp_watt',
                'operator'   => 'gte',
                'is_blocking'=> false,
                'message'    => 'Il dissipatore potrebbe non reggere il TDP della CPU sotto carico prolungato.',
            ],
        ];

        foreach ($rules as $rule) {
            CompatibilityRule::create($rule);
        }
    }
}
