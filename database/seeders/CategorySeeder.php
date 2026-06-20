<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $categories = [
            ['name' => 'CPU',        'slug' => 'cpu',        'icon' => 'Cpu',          'sort_order' => 1],
            ['name' => 'Motherboard','slug' => 'motherboard','icon' => 'CircuitBoard',  'sort_order' => 2],
            ['name' => 'RAM',        'slug' => 'ram',        'icon' => 'MemoryStick',   'sort_order' => 3],
            ['name' => 'GPU',        'slug' => 'gpu',        'icon' => 'Monitor',       'sort_order' => 4],
            ['name' => 'Storage',    'slug' => 'storage',    'icon' => 'HardDrive',     'sort_order' => 5],
            ['name' => 'PSU',        'slug' => 'psu',        'icon' => 'Zap',           'sort_order' => 6],
            ['name' => 'Case',       'slug' => 'case',       'icon' => 'Box',           'sort_order' => 7],
            ['name' => 'CPU Cooler', 'slug' => 'cpu-cooler', 'icon' => 'Wind',          'sort_order' => 8],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
