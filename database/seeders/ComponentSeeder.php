<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Component;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComponentSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->seedCpus();
        $this->seedMotherboards();
        $this->seedRam();
        $this->seedGpus();
        $this->seedStorage();
        $this->seedPsus();
        $this->seedCases();
        $this->seedCoolers();
    }

    private function create(string $slug, array $data): void
    {
        $category = Category::where('slug', $slug)->first();
        $specs = $data['specs'];
        unset($data['specs']);

        $component = Component::create(array_merge(['category_id' => $category->id], $data));
        $component->specs()->createMany($specs);
    }

    private function seedCpus(): void
    {
        $components = [
            [
                'name' => 'Intel Core i9-14900K', 'brand' => 'Intel', 'model' => 'Core i9-14900K',
                'price' => 589.00, 'wattage' => 125,
                'image_url' => 'https://m.media-amazon.com/images/I/61dNevBODOL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket',        'spec_value' => 'LGA1700'],
                    ['spec_key' => 'ddr_support',   'spec_value' => 'DDR4,DDR5'],
                    ['spec_key' => 'max_ram_speed', 'spec_value' => '5600'],
                    ['spec_key' => 'tdp_watt',      'spec_value' => '125'],
                ],
            ],
            [
                'name' => 'Intel Core i7-14700K', 'brand' => 'Intel', 'model' => 'Core i7-14700K',
                'price' => 389.00, 'wattage' => 125,
                'image_url' => 'https://m.media-amazon.com/images/I/61C7JTWLcGL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket',        'spec_value' => 'LGA1700'],
                    ['spec_key' => 'ddr_support',   'spec_value' => 'DDR4,DDR5'],
                    ['spec_key' => 'max_ram_speed', 'spec_value' => '5600'],
                    ['spec_key' => 'tdp_watt',      'spec_value' => '125'],
                ],
            ],
            [
                'name' => 'Intel Core i5-14600K', 'brand' => 'Intel', 'model' => 'Core i5-14600K',
                'price' => 289.00, 'wattage' => 125,
                'image_url' => 'https://m.media-amazon.com/images/I/61RYCXtb4HL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket',        'spec_value' => 'LGA1700'],
                    ['spec_key' => 'ddr_support',   'spec_value' => 'DDR4,DDR5'],
                    ['spec_key' => 'max_ram_speed', 'spec_value' => '4800'],
                    ['spec_key' => 'tdp_watt',      'spec_value' => '125'],
                ],
            ],
            [
                'name' => 'Intel Core i3-14100', 'brand' => 'Intel', 'model' => 'Core i3-14100',
                'price' => 129.00, 'wattage' => 60,
                'image_url' => 'https://m.media-amazon.com/images/I/61NqNznygML._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket',        'spec_value' => 'LGA1700'],
                    ['spec_key' => 'ddr_support',   'spec_value' => 'DDR4,DDR5'],
                    ['spec_key' => 'max_ram_speed', 'spec_value' => '4800'],
                    ['spec_key' => 'tdp_watt',      'spec_value' => '60'],
                ],
            ],
            [
                'name' => 'Intel Core i5-13600K', 'brand' => 'Intel', 'model' => 'Core i5-13600K',
                'price' => 249.00, 'wattage' => 125,
                'image_url' => 'https://m.media-amazon.com/images/I/61h0VkGFhML._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket',        'spec_value' => 'LGA1700'],
                    ['spec_key' => 'ddr_support',   'spec_value' => 'DDR4,DDR5'],
                    ['spec_key' => 'max_ram_speed', 'spec_value' => '4800'],
                    ['spec_key' => 'tdp_watt',      'spec_value' => '125'],
                ],
            ],
            [
                'name' => 'AMD Ryzen 9 7950X', 'brand' => 'AMD', 'model' => 'Ryzen 9 7950X',
                'price' => 579.00, 'wattage' => 170,
                'image_url' => 'https://m.media-amazon.com/images/I/61oE3WVKQ-L._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket',        'spec_value' => 'AM5'],
                    ['spec_key' => 'ddr_support',   'spec_value' => 'DDR5'],
                    ['spec_key' => 'max_ram_speed', 'spec_value' => '5200'],
                    ['spec_key' => 'tdp_watt',      'spec_value' => '170'],
                ],
            ],
            [
                'name' => 'AMD Ryzen 9 7900X', 'brand' => 'AMD', 'model' => 'Ryzen 9 7900X',
                'price' => 379.00, 'wattage' => 170,
                'image_url' => 'https://m.media-amazon.com/images/I/61XGVMVpL3L._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket',        'spec_value' => 'AM5'],
                    ['spec_key' => 'ddr_support',   'spec_value' => 'DDR5'],
                    ['spec_key' => 'max_ram_speed', 'spec_value' => '5200'],
                    ['spec_key' => 'tdp_watt',      'spec_value' => '170'],
                ],
            ],
            [
                'name' => 'AMD Ryzen 7 7700X', 'brand' => 'AMD', 'model' => 'Ryzen 7 7700X',
                'price' => 269.00, 'wattage' => 105,
                'image_url' => 'https://m.media-amazon.com/images/I/619OQHLqRSL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket',        'spec_value' => 'AM5'],
                    ['spec_key' => 'ddr_support',   'spec_value' => 'DDR5'],
                    ['spec_key' => 'max_ram_speed', 'spec_value' => '5200'],
                    ['spec_key' => 'tdp_watt',      'spec_value' => '105'],
                ],
            ],
            [
                'name' => 'AMD Ryzen 5 7600X', 'brand' => 'AMD', 'model' => 'Ryzen 5 7600X',
                'price' => 199.00, 'wattage' => 105,
                'image_url' => 'https://m.media-amazon.com/images/I/61S4jtJVz5L._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket',        'spec_value' => 'AM5'],
                    ['spec_key' => 'ddr_support',   'spec_value' => 'DDR5'],
                    ['spec_key' => 'max_ram_speed', 'spec_value' => '5200'],
                    ['spec_key' => 'tdp_watt',      'spec_value' => '105'],
                ],
            ],
            [
                'name' => 'AMD Ryzen 5 7600', 'brand' => 'AMD', 'model' => 'Ryzen 5 7600',
                'price' => 169.00, 'wattage' => 65,
                'image_url' => 'https://m.media-amazon.com/images/I/51Y6Md7VhEL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket',        'spec_value' => 'AM5'],
                    ['spec_key' => 'ddr_support',   'spec_value' => 'DDR5'],
                    ['spec_key' => 'max_ram_speed', 'spec_value' => '5200'],
                    ['spec_key' => 'tdp_watt',      'spec_value' => '65'],
                ],
            ],
            [
                'name' => 'AMD Ryzen 5 5600X', 'brand' => 'AMD', 'model' => 'Ryzen 5 5600X',
                'price' => 129.00, 'wattage' => 65,
                'image_url' => 'https://m.media-amazon.com/images/I/61fGUOvvUiL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket',        'spec_value' => 'AM4'],
                    ['spec_key' => 'ddr_support',   'spec_value' => 'DDR4'],
                    ['spec_key' => 'max_ram_speed', 'spec_value' => '3200'],
                    ['spec_key' => 'tdp_watt',      'spec_value' => '65'],
                ],
            ],
            [
                'name' => 'AMD Ryzen 7 5800X3D', 'brand' => 'AMD', 'model' => 'Ryzen 7 5800X3D',
                'price' => 229.00, 'wattage' => 105,
                'image_url' => 'https://m.media-amazon.com/images/I/61VJsBSC8sL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket',        'spec_value' => 'AM4'],
                    ['spec_key' => 'ddr_support',   'spec_value' => 'DDR4'],
                    ['spec_key' => 'max_ram_speed', 'spec_value' => '3200'],
                    ['spec_key' => 'tdp_watt',      'spec_value' => '105'],
                ],
            ],
            [
                'name' => 'Intel Core i9-12900K', 'brand' => 'Intel', 'model' => 'Core i9-12900K',
                'price' => 239.00, 'wattage' => 125,
                'image_url' => 'https://m.media-amazon.com/images/I/41t7bqhK18L._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket',        'spec_value' => 'LGA1700'],
                    ['spec_key' => 'ddr_support',   'spec_value' => 'DDR4,DDR5'],
                    ['spec_key' => 'max_ram_speed', 'spec_value' => '4800'],
                    ['spec_key' => 'tdp_watt',      'spec_value' => '125'],
                ],
            ],
            [
                'name' => 'Intel Core i5-12400F', 'brand' => 'Intel', 'model' => 'Core i5-12400F',
                'price' => 119.00, 'wattage' => 65,
                'image_url' => 'https://m.media-amazon.com/images/I/41pJJVVhVkL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket',        'spec_value' => 'LGA1700'],
                    ['spec_key' => 'ddr_support',   'spec_value' => 'DDR4'],
                    ['spec_key' => 'max_ram_speed', 'spec_value' => '4800'],
                    ['spec_key' => 'tdp_watt',      'spec_value' => '65'],
                ],
            ],
            [
                'name' => 'AMD Ryzen 9 5950X', 'brand' => 'AMD', 'model' => 'Ryzen 9 5950X',
                'price' => 279.00, 'wattage' => 105,
                'image_url' => 'https://m.media-amazon.com/images/I/61Ug7GkSMnL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket',        'spec_value' => 'AM4'],
                    ['spec_key' => 'ddr_support',   'spec_value' => 'DDR4'],
                    ['spec_key' => 'max_ram_speed', 'spec_value' => '3200'],
                    ['spec_key' => 'tdp_watt',      'spec_value' => '105'],
                ],
            ],
        ];

        foreach ($components as $data) {
            $this->create('cpu', $data);
        }
    }

    private function seedMotherboards(): void
    {
        $components = [
            [
                'name' => 'ASUS ROG MAXIMUS Z790 HERO', 'brand' => 'ASUS', 'model' => 'ROG MAXIMUS Z790 HERO',
                'price' => 589.00, 'wattage' => 50,
                'image_url' => 'https://m.media-amazon.com/images/I/51yI5wORdBL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket',       'spec_value' => 'LGA1700'],
                    ['spec_key' => 'ddr_gen',      'spec_value' => 'DDR5'],
                    ['spec_key' => 'form_factor',  'spec_value' => 'ATX'],
                    ['spec_key' => 'max_ram_slots','spec_value' => '4'],
                    ['spec_key' => 'max_ram_gb',   'spec_value' => '128'],
                    ['spec_key' => 'm2_slots',     'spec_value' => '5'],
                ],
            ],
            [
                'name' => 'MSI MAG Z790 TOMAHAWK WIFI', 'brand' => 'MSI', 'model' => 'MAG Z790 TOMAHAWK WIFI',
                'price' => 289.00, 'wattage' => 40,
                'image_url' => 'https://m.media-amazon.com/images/I/61lZKrjbMoL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket',       'spec_value' => 'LGA1700'],
                    ['spec_key' => 'ddr_gen',      'spec_value' => 'DDR5'],
                    ['spec_key' => 'form_factor',  'spec_value' => 'ATX'],
                    ['spec_key' => 'max_ram_slots','spec_value' => '4'],
                    ['spec_key' => 'max_ram_gb',   'spec_value' => '128'],
                    ['spec_key' => 'm2_slots',     'spec_value' => '4'],
                ],
            ],
            [
                'name' => 'Gigabyte Z790 AORUS ELITE AX', 'brand' => 'Gigabyte', 'model' => 'Z790 AORUS ELITE AX',
                'price' => 349.00, 'wattage' => 45,
                'image_url' => 'https://m.media-amazon.com/images/I/61q5q9jAr4L._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket',       'spec_value' => 'LGA1700'],
                    ['spec_key' => 'ddr_gen',      'spec_value' => 'DDR5'],
                    ['spec_key' => 'form_factor',  'spec_value' => 'ATX'],
                    ['spec_key' => 'max_ram_slots','spec_value' => '4'],
                    ['spec_key' => 'max_ram_gb',   'spec_value' => '128'],
                    ['spec_key' => 'm2_slots',     'spec_value' => '4'],
                ],
            ],
            [
                'name' => 'ASUS PRIME Z790-P WIFI', 'brand' => 'ASUS', 'model' => 'PRIME Z790-P WIFI',
                'price' => 229.00, 'wattage' => 35,
                'image_url' => 'https://m.media-amazon.com/images/I/51UDzxWOhL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket',       'spec_value' => 'LGA1700'],
                    ['spec_key' => 'ddr_gen',      'spec_value' => 'DDR5'],
                    ['spec_key' => 'form_factor',  'spec_value' => 'ATX'],
                    ['spec_key' => 'max_ram_slots','spec_value' => '4'],
                    ['spec_key' => 'max_ram_gb',   'spec_value' => '128'],
                    ['spec_key' => 'm2_slots',     'spec_value' => '3'],
                ],
            ],
            [
                'name' => 'MSI PRO Z790-A WIFI DDR4', 'brand' => 'MSI', 'model' => 'PRO Z790-A WIFI DDR4',
                'price' => 199.00, 'wattage' => 35,
                'image_url' => 'https://m.media-amazon.com/images/I/51GqHNybKHL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket',       'spec_value' => 'LGA1700'],
                    ['spec_key' => 'ddr_gen',      'spec_value' => 'DDR4'],
                    ['spec_key' => 'form_factor',  'spec_value' => 'ATX'],
                    ['spec_key' => 'max_ram_slots','spec_value' => '4'],
                    ['spec_key' => 'max_ram_gb',   'spec_value' => '128'],
                    ['spec_key' => 'm2_slots',     'spec_value' => '3'],
                ],
            ],
            [
                'name' => 'ASUS ROG CROSSHAIR X670E HERO', 'brand' => 'ASUS', 'model' => 'ROG CROSSHAIR X670E HERO',
                'price' => 599.00, 'wattage' => 50,
                'image_url' => 'https://m.media-amazon.com/images/I/51hqsRR6aL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket',       'spec_value' => 'AM5'],
                    ['spec_key' => 'ddr_gen',      'spec_value' => 'DDR5'],
                    ['spec_key' => 'form_factor',  'spec_value' => 'ATX'],
                    ['spec_key' => 'max_ram_slots','spec_value' => '4'],
                    ['spec_key' => 'max_ram_gb',   'spec_value' => '128'],
                    ['spec_key' => 'm2_slots',     'spec_value' => '5'],
                ],
            ],
            [
                'name' => 'MSI MEG X670E ACE', 'brand' => 'MSI', 'model' => 'MEG X670E ACE',
                'price' => 549.00, 'wattage' => 50,
                'image_url' => 'https://m.media-amazon.com/images/I/51VHbQyZnnL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket',       'spec_value' => 'AM5'],
                    ['spec_key' => 'ddr_gen',      'spec_value' => 'DDR5'],
                    ['spec_key' => 'form_factor',  'spec_value' => 'ATX'],
                    ['spec_key' => 'max_ram_slots','spec_value' => '4'],
                    ['spec_key' => 'max_ram_gb',   'spec_value' => '128'],
                    ['spec_key' => 'm2_slots',     'spec_value' => '5'],
                ],
            ],
            [
                'name' => 'Gigabyte X670E AORUS MASTER', 'brand' => 'Gigabyte', 'model' => 'X670E AORUS MASTER',
                'price' => 449.00, 'wattage' => 45,
                'image_url' => 'https://m.media-amazon.com/images/I/61ZEpXHRbL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket',       'spec_value' => 'AM5'],
                    ['spec_key' => 'ddr_gen',      'spec_value' => 'DDR5'],
                    ['spec_key' => 'form_factor',  'spec_value' => 'ATX'],
                    ['spec_key' => 'max_ram_slots','spec_value' => '4'],
                    ['spec_key' => 'max_ram_gb',   'spec_value' => '128'],
                    ['spec_key' => 'm2_slots',     'spec_value' => '4'],
                ],
            ],
            [
                'name' => 'ASUS TUF GAMING X670E-PLUS WIFI', 'brand' => 'ASUS', 'model' => 'TUF GAMING X670E-PLUS WIFI',
                'price' => 249.00, 'wattage' => 40,
                'image_url' => 'https://m.media-amazon.com/images/I/61aIIoOTbFL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket',       'spec_value' => 'AM5'],
                    ['spec_key' => 'ddr_gen',      'spec_value' => 'DDR5'],
                    ['spec_key' => 'form_factor',  'spec_value' => 'ATX'],
                    ['spec_key' => 'max_ram_slots','spec_value' => '4'],
                    ['spec_key' => 'max_ram_gb',   'spec_value' => '128'],
                    ['spec_key' => 'm2_slots',     'spec_value' => '4'],
                ],
            ],
            [
                'name' => 'MSI MAG B650 TOMAHAWK WIFI', 'brand' => 'MSI', 'model' => 'MAG B650 TOMAHAWK WIFI',
                'price' => 199.00, 'wattage' => 35,
                'image_url' => 'https://m.media-amazon.com/images/I/61K4bkRb5HL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket',       'spec_value' => 'AM5'],
                    ['spec_key' => 'ddr_gen',      'spec_value' => 'DDR5'],
                    ['spec_key' => 'form_factor',  'spec_value' => 'ATX'],
                    ['spec_key' => 'max_ram_slots','spec_value' => '4'],
                    ['spec_key' => 'max_ram_gb',   'spec_value' => '128'],
                    ['spec_key' => 'm2_slots',     'spec_value' => '3'],
                ],
            ],
            [
                'name' => 'ASUS ROG STRIX B550-F GAMING WIFI', 'brand' => 'ASUS', 'model' => 'ROG STRIX B550-F GAMING WIFI',
                'price' => 189.00, 'wattage' => 35,
                'image_url' => 'https://m.media-amazon.com/images/I/61t5kKCOKML._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket',       'spec_value' => 'AM4'],
                    ['spec_key' => 'ddr_gen',      'spec_value' => 'DDR4'],
                    ['spec_key' => 'form_factor',  'spec_value' => 'ATX'],
                    ['spec_key' => 'max_ram_slots','spec_value' => '4'],
                    ['spec_key' => 'max_ram_gb',   'spec_value' => '128'],
                    ['spec_key' => 'm2_slots',     'spec_value' => '2'],
                ],
            ],
            [
                'name' => 'MSI MAG B550 TOMAHAWK', 'brand' => 'MSI', 'model' => 'MAG B550 TOMAHAWK',
                'price' => 149.00, 'wattage' => 30,
                'image_url' => 'https://m.media-amazon.com/images/I/61MJmSf4WVL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket',       'spec_value' => 'AM4'],
                    ['spec_key' => 'ddr_gen',      'spec_value' => 'DDR4'],
                    ['spec_key' => 'form_factor',  'spec_value' => 'ATX'],
                    ['spec_key' => 'max_ram_slots','spec_value' => '4'],
                    ['spec_key' => 'max_ram_gb',   'spec_value' => '128'],
                    ['spec_key' => 'm2_slots',     'spec_value' => '2'],
                ],
            ],
            [
                'name' => 'Gigabyte B550 AORUS PRO AX', 'brand' => 'Gigabyte', 'model' => 'B550 AORUS PRO AX',
                'price' => 169.00, 'wattage' => 35,
                'image_url' => 'https://m.media-amazon.com/images/I/61YfVuGmxiL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket',       'spec_value' => 'AM4'],
                    ['spec_key' => 'ddr_gen',      'spec_value' => 'DDR4'],
                    ['spec_key' => 'form_factor',  'spec_value' => 'ATX'],
                    ['spec_key' => 'max_ram_slots','spec_value' => '4'],
                    ['spec_key' => 'max_ram_gb',   'spec_value' => '128'],
                    ['spec_key' => 'm2_slots',     'spec_value' => '2'],
                ],
            ],
            [
                'name' => 'ASUS PRIME B660M-A D4', 'brand' => 'ASUS', 'model' => 'PRIME B660M-A D4',
                'price' => 139.00, 'wattage' => 30,
                'image_url' => 'https://m.media-amazon.com/images/I/61gWqJMBvOL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket',       'spec_value' => 'LGA1700'],
                    ['spec_key' => 'ddr_gen',      'spec_value' => 'DDR4'],
                    ['spec_key' => 'form_factor',  'spec_value' => 'Micro-ATX'],
                    ['spec_key' => 'max_ram_slots','spec_value' => '4'],
                    ['spec_key' => 'max_ram_gb',   'spec_value' => '64'],
                    ['spec_key' => 'm2_slots',     'spec_value' => '2'],
                ],
            ],
            [
                'name' => 'MSI MAG B660M MORTAR WIFI DDR4', 'brand' => 'MSI', 'model' => 'MAG B660M MORTAR WIFI DDR4',
                'price' => 149.00, 'wattage' => 30,
                'image_url' => 'https://m.media-amazon.com/images/I/61bN3vjjcwL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket',       'spec_value' => 'LGA1700'],
                    ['spec_key' => 'ddr_gen',      'spec_value' => 'DDR4'],
                    ['spec_key' => 'form_factor',  'spec_value' => 'Micro-ATX'],
                    ['spec_key' => 'max_ram_slots','spec_value' => '4'],
                    ['spec_key' => 'max_ram_gb',   'spec_value' => '64'],
                    ['spec_key' => 'm2_slots',     'spec_value' => '2'],
                ],
            ],
        ];

        foreach ($components as $data) {
            $this->create('motherboard', $data);
        }
    }

    private function seedRam(): void
    {
        $components = [
            [
                'name' => 'Corsair Vengeance DDR5-5600 32GB', 'brand' => 'Corsair', 'model' => 'Vengeance DDR5-5600 32GB',
                'price' => 109.00, 'wattage' => 10,
                'image_url' => 'https://m.media-amazon.com/images/I/61z4kpf5RL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'ddr_gen',     'spec_value' => 'DDR5'],
                    ['spec_key' => 'speed_mhz',   'spec_value' => '5600'],
                    ['spec_key' => 'capacity_gb', 'spec_value' => '32'],
                    ['spec_key' => 'form_factor', 'spec_value' => 'DIMM'],
                ],
            ],
            [
                'name' => 'G.Skill Trident Z5 DDR5-6000 32GB', 'brand' => 'G.Skill', 'model' => 'Trident Z5 DDR5-6000 32GB',
                'price' => 129.00, 'wattage' => 10,
                'image_url' => 'https://m.media-amazon.com/images/I/61RfULqLBL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'ddr_gen',     'spec_value' => 'DDR5'],
                    ['spec_key' => 'speed_mhz',   'spec_value' => '6000'],
                    ['spec_key' => 'capacity_gb', 'spec_value' => '32'],
                    ['spec_key' => 'form_factor', 'spec_value' => 'DIMM'],
                ],
            ],
            [
                'name' => 'Kingston Fury Beast DDR5-5200 16GB', 'brand' => 'Kingston', 'model' => 'Fury Beast DDR5-5200 16GB',
                'price' => 59.00, 'wattage' => 6,
                'image_url' => 'https://m.media-amazon.com/images/I/51lGBPiqDNL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'ddr_gen',     'spec_value' => 'DDR5'],
                    ['spec_key' => 'speed_mhz',   'spec_value' => '5200'],
                    ['spec_key' => 'capacity_gb', 'spec_value' => '16'],
                    ['spec_key' => 'form_factor', 'spec_value' => 'DIMM'],
                ],
            ],
            [
                'name' => 'Corsair Vengeance DDR5-4800 32GB', 'brand' => 'Corsair', 'model' => 'Vengeance DDR5-4800 32GB',
                'price' => 89.00, 'wattage' => 10,
                'image_url' => 'https://m.media-amazon.com/images/I/71PzqzSQKL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'ddr_gen',     'spec_value' => 'DDR5'],
                    ['spec_key' => 'speed_mhz',   'spec_value' => '4800'],
                    ['spec_key' => 'capacity_gb', 'spec_value' => '32'],
                    ['spec_key' => 'form_factor', 'spec_value' => 'DIMM'],
                ],
            ],
            [
                'name' => 'G.Skill Ripjaws S5 DDR5-6000 64GB', 'brand' => 'G.Skill', 'model' => 'Ripjaws S5 DDR5-6000 64GB',
                'price' => 219.00, 'wattage' => 15,
                'image_url' => 'https://m.media-amazon.com/images/I/61FJDkjMXCL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'ddr_gen',     'spec_value' => 'DDR5'],
                    ['spec_key' => 'speed_mhz',   'spec_value' => '6000'],
                    ['spec_key' => 'capacity_gb', 'spec_value' => '64'],
                    ['spec_key' => 'form_factor', 'spec_value' => 'DIMM'],
                ],
            ],
            [
                'name' => 'Corsair Vengeance LPX DDR4-3200 16GB', 'brand' => 'Corsair', 'model' => 'Vengeance LPX DDR4-3200 16GB',
                'price' => 39.00, 'wattage' => 5,
                'image_url' => 'https://m.media-amazon.com/images/I/61nqNznygML._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'ddr_gen',     'spec_value' => 'DDR4'],
                    ['spec_key' => 'speed_mhz',   'spec_value' => '3200'],
                    ['spec_key' => 'capacity_gb', 'spec_value' => '16'],
                    ['spec_key' => 'form_factor', 'spec_value' => 'DIMM'],
                ],
            ],
            [
                'name' => 'G.Skill Trident Z Neo DDR4-3600 32GB', 'brand' => 'G.Skill', 'model' => 'Trident Z Neo DDR4-3600 32GB',
                'price' => 79.00, 'wattage' => 8,
                'image_url' => 'https://m.media-amazon.com/images/I/61xXdeTLwvL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'ddr_gen',     'spec_value' => 'DDR4'],
                    ['spec_key' => 'speed_mhz',   'spec_value' => '3600'],
                    ['spec_key' => 'capacity_gb', 'spec_value' => '32'],
                    ['spec_key' => 'form_factor', 'spec_value' => 'DIMM'],
                ],
            ],
            [
                'name' => 'Kingston Fury Beast DDR4-3200 32GB', 'brand' => 'Kingston', 'model' => 'Fury Beast DDR4-3200 32GB',
                'price' => 69.00, 'wattage' => 8,
                'image_url' => 'https://m.media-amazon.com/images/I/51Rx6BdBMQL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'ddr_gen',     'spec_value' => 'DDR4'],
                    ['spec_key' => 'speed_mhz',   'spec_value' => '3200'],
                    ['spec_key' => 'capacity_gb', 'spec_value' => '32'],
                    ['spec_key' => 'form_factor', 'spec_value' => 'DIMM'],
                ],
            ],
            [
                'name' => 'Corsair Vengeance RGB Pro DDR4-3600 16GB', 'brand' => 'Corsair', 'model' => 'Vengeance RGB Pro DDR4-3600 16GB',
                'price' => 49.00, 'wattage' => 5,
                'image_url' => 'https://m.media-amazon.com/images/I/81p0riDqt8L._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'ddr_gen',     'spec_value' => 'DDR4'],
                    ['spec_key' => 'speed_mhz',   'spec_value' => '3600'],
                    ['spec_key' => 'capacity_gb', 'spec_value' => '16'],
                    ['spec_key' => 'form_factor', 'spec_value' => 'DIMM'],
                ],
            ],
            [
                'name' => 'G.Skill Ripjaws V DDR4-3200 64GB', 'brand' => 'G.Skill', 'model' => 'Ripjaws V DDR4-3200 64GB',
                'price' => 129.00, 'wattage' => 12,
                'image_url' => 'https://m.media-amazon.com/images/I/61FzQXJWGRL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'ddr_gen',     'spec_value' => 'DDR4'],
                    ['spec_key' => 'speed_mhz',   'spec_value' => '3200'],
                    ['spec_key' => 'capacity_gb', 'spec_value' => '64'],
                    ['spec_key' => 'form_factor', 'spec_value' => 'DIMM'],
                ],
            ],
            [
                'name' => 'Crucial DDR5-4800 16GB', 'brand' => 'Crucial', 'model' => 'DDR5-4800 16GB',
                'price' => 49.00, 'wattage' => 6,
                'image_url' => 'https://m.media-amazon.com/images/I/61d1U7GdoOL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'ddr_gen',     'spec_value' => 'DDR5'],
                    ['spec_key' => 'speed_mhz',   'spec_value' => '4800'],
                    ['spec_key' => 'capacity_gb', 'spec_value' => '16'],
                    ['spec_key' => 'form_factor', 'spec_value' => 'DIMM'],
                ],
            ],
            [
                'name' => 'TeamGroup T-Force Delta DDR5-6000 32GB', 'brand' => 'TeamGroup', 'model' => 'T-Force Delta DDR5-6000 32GB',
                'price' => 119.00, 'wattage' => 10,
                'image_url' => 'https://m.media-amazon.com/images/I/61R5b8KJHML._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'ddr_gen',     'spec_value' => 'DDR5'],
                    ['spec_key' => 'speed_mhz',   'spec_value' => '6000'],
                    ['spec_key' => 'capacity_gb', 'spec_value' => '32'],
                    ['spec_key' => 'form_factor', 'spec_value' => 'DIMM'],
                ],
            ],
            [
                'name' => 'Kingston Fury Renegade DDR5-6000 32GB', 'brand' => 'Kingston', 'model' => 'Fury Renegade DDR5-6000 32GB',
                'price' => 139.00, 'wattage' => 10,
                'image_url' => 'https://m.media-amazon.com/images/I/51kKmLFr5tL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'ddr_gen',     'spec_value' => 'DDR5'],
                    ['spec_key' => 'speed_mhz',   'spec_value' => '6000'],
                    ['spec_key' => 'capacity_gb', 'spec_value' => '32'],
                    ['spec_key' => 'form_factor', 'spec_value' => 'DIMM'],
                ],
            ],
            [
                'name' => 'Corsair Dominator Platinum DDR5-5600 64GB', 'brand' => 'Corsair', 'model' => 'Dominator Platinum DDR5-5600 64GB',
                'price' => 229.00, 'wattage' => 15,
                'image_url' => 'https://m.media-amazon.com/images/I/71pCFqiPNL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'ddr_gen',     'spec_value' => 'DDR5'],
                    ['spec_key' => 'speed_mhz',   'spec_value' => '5600'],
                    ['spec_key' => 'capacity_gb', 'spec_value' => '64'],
                    ['spec_key' => 'form_factor', 'spec_value' => 'DIMM'],
                ],
            ],
            [
                'name' => 'G.Skill Aegis DDR4-3000 16GB', 'brand' => 'G.Skill', 'model' => 'Aegis DDR4-3000 16GB',
                'price' => 34.00, 'wattage' => 5,
                'image_url' => 'https://m.media-amazon.com/images/I/61Fg0VyQGtL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'ddr_gen',     'spec_value' => 'DDR4'],
                    ['spec_key' => 'speed_mhz',   'spec_value' => '3000'],
                    ['spec_key' => 'capacity_gb', 'spec_value' => '16'],
                    ['spec_key' => 'form_factor', 'spec_value' => 'DIMM'],
                ],
            ],
        ];

        foreach ($components as $data) {
            $this->create('ram', $data);
        }
    }

    private function seedGpus(): void
    {
        $components = [
            [
                'name' => 'ASUS ROG STRIX RTX 4090 OC', 'brand' => 'ASUS', 'model' => 'ROG STRIX RTX 4090 OC',
                'price' => 1699.00, 'wattage' => 450,
                'image_url' => 'https://m.media-amazon.com/images/I/71YG9aJrpKL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'tdp_watt',    'spec_value' => '450'],
                    ['spec_key' => 'length_mm',   'spec_value' => '357'],
                    ['spec_key' => 'pcie_version','spec_value' => 'PCIe 4.0'],
                ],
            ],
            [
                'name' => 'MSI Gaming Trio RTX 4080 Super', 'brand' => 'MSI', 'model' => 'Gaming Trio RTX 4080 Super',
                'price' => 1099.00, 'wattage' => 320,
                'image_url' => 'https://m.media-amazon.com/images/I/61S4Ff2VPTL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'tdp_watt',    'spec_value' => '320'],
                    ['spec_key' => 'length_mm',   'spec_value' => '337'],
                    ['spec_key' => 'pcie_version','spec_value' => 'PCIe 4.0'],
                ],
            ],
            [
                'name' => 'Gigabyte AORUS RTX 4070 Ti Super', 'brand' => 'Gigabyte', 'model' => 'AORUS RTX 4070 Ti Super',
                'price' => 799.00, 'wattage' => 285,
                'image_url' => 'https://m.media-amazon.com/images/I/61qzM2v6QL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'tdp_watt',    'spec_value' => '285'],
                    ['spec_key' => 'length_mm',   'spec_value' => '320'],
                    ['spec_key' => 'pcie_version','spec_value' => 'PCIe 4.0'],
                ],
            ],
            [
                'name' => 'ASUS TUF RTX 4070 Super OC', 'brand' => 'ASUS', 'model' => 'TUF RTX 4070 Super OC',
                'price' => 599.00, 'wattage' => 220,
                'image_url' => 'https://m.media-amazon.com/images/I/61U5JWxTb5L._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'tdp_watt',    'spec_value' => '220'],
                    ['spec_key' => 'length_mm',   'spec_value' => '305'],
                    ['spec_key' => 'pcie_version','spec_value' => 'PCIe 4.0'],
                ],
            ],
            [
                'name' => 'MSI Ventus 3X RTX 4070', 'brand' => 'MSI', 'model' => 'Ventus 3X RTX 4070',
                'price' => 499.00, 'wattage' => 200,
                'image_url' => 'https://m.media-amazon.com/images/I/61p9YJ5YaUL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'tdp_watt',    'spec_value' => '200'],
                    ['spec_key' => 'length_mm',   'spec_value' => '290'],
                    ['spec_key' => 'pcie_version','spec_value' => 'PCIe 4.0'],
                ],
            ],
            [
                'name' => 'ASUS Dual RTX 4060 Ti OC', 'brand' => 'ASUS', 'model' => 'Dual RTX 4060 Ti OC',
                'price' => 379.00, 'wattage' => 165,
                'image_url' => 'https://m.media-amazon.com/images/I/61eE7JCzOML._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'tdp_watt',    'spec_value' => '165'],
                    ['spec_key' => 'length_mm',   'spec_value' => '260'],
                    ['spec_key' => 'pcie_version','spec_value' => 'PCIe 4.0'],
                ],
            ],
            [
                'name' => 'MSI Gaming X RTX 4060', 'brand' => 'MSI', 'model' => 'Gaming X RTX 4060',
                'price' => 289.00, 'wattage' => 115,
                'image_url' => 'https://m.media-amazon.com/images/I/61d8EJKQXDL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'tdp_watt',    'spec_value' => '115'],
                    ['spec_key' => 'length_mm',   'spec_value' => '227'],
                    ['spec_key' => 'pcie_version','spec_value' => 'PCIe 4.0'],
                ],
            ],
            [
                'name' => 'Sapphire NITRO+ RX 7900 XTX', 'brand' => 'Sapphire', 'model' => 'NITRO+ RX 7900 XTX',
                'price' => 899.00, 'wattage' => 355,
                'image_url' => 'https://m.media-amazon.com/images/I/61BuHYNRY3L._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'tdp_watt',    'spec_value' => '355'],
                    ['spec_key' => 'length_mm',   'spec_value' => '340'],
                    ['spec_key' => 'pcie_version','spec_value' => 'PCIe 4.0'],
                ],
            ],
            [
                'name' => 'PowerColor Red Devil RX 7900 XT', 'brand' => 'PowerColor', 'model' => 'Red Devil RX 7900 XT',
                'price' => 699.00, 'wattage' => 315,
                'image_url' => 'https://m.media-amazon.com/images/I/51yUcmZkSWL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'tdp_watt',    'spec_value' => '315'],
                    ['spec_key' => 'length_mm',   'spec_value' => '330'],
                    ['spec_key' => 'pcie_version','spec_value' => 'PCIe 4.0'],
                ],
            ],
            [
                'name' => 'MSI Gaming RX 7800 XT', 'brand' => 'MSI', 'model' => 'Gaming RX 7800 XT',
                'price' => 489.00, 'wattage' => 263,
                'image_url' => 'https://m.media-amazon.com/images/I/61nXnL1dq5L._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'tdp_watt',    'spec_value' => '263'],
                    ['spec_key' => 'length_mm',   'spec_value' => '310'],
                    ['spec_key' => 'pcie_version','spec_value' => 'PCIe 4.0'],
                ],
            ],
            [
                'name' => 'Sapphire Pulse RX 7700 XT', 'brand' => 'Sapphire', 'model' => 'Pulse RX 7700 XT',
                'price' => 379.00, 'wattage' => 245,
                'image_url' => 'https://m.media-amazon.com/images/I/61sL2ZUBVKL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'tdp_watt',    'spec_value' => '245'],
                    ['spec_key' => 'length_mm',   'spec_value' => '280'],
                    ['spec_key' => 'pcie_version','spec_value' => 'PCIe 4.0'],
                ],
            ],
            [
                'name' => 'PowerColor Fighter RX 7600', 'brand' => 'PowerColor', 'model' => 'Fighter RX 7600',
                'price' => 249.00, 'wattage' => 165,
                'image_url' => 'https://m.media-amazon.com/images/I/71s3DUPcnWL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'tdp_watt',    'spec_value' => '165'],
                    ['spec_key' => 'length_mm',   'spec_value' => '200'],
                    ['spec_key' => 'pcie_version','spec_value' => 'PCIe 4.0'],
                ],
            ],
            [
                'name' => 'ASUS TUF RTX 3080 10GB', 'brand' => 'ASUS', 'model' => 'TUF RTX 3080 10GB',
                'price' => 499.00, 'wattage' => 320,
                'image_url' => 'https://m.media-amazon.com/images/I/61vxDqQFTRL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'tdp_watt',    'spec_value' => '320'],
                    ['spec_key' => 'length_mm',   'spec_value' => '318'],
                    ['spec_key' => 'pcie_version','spec_value' => 'PCIe 4.0'],
                ],
            ],
            [
                'name' => 'MSI Suprim X RTX 3070 Ti', 'brand' => 'MSI', 'model' => 'Suprim X RTX 3070 Ti',
                'price' => 399.00, 'wattage' => 290,
                'image_url' => 'https://m.media-amazon.com/images/I/61kSNr2AKML._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'tdp_watt',    'spec_value' => '290'],
                    ['spec_key' => 'length_mm',   'spec_value' => '308'],
                    ['spec_key' => 'pcie_version','spec_value' => 'PCIe 4.0'],
                ],
            ],
            [
                'name' => 'Gigabyte Gaming OC RTX 3060', 'brand' => 'Gigabyte', 'model' => 'Gaming OC RTX 3060',
                'price' => 279.00, 'wattage' => 170,
                'image_url' => 'https://m.media-amazon.com/images/I/61a1mONfGvL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'tdp_watt',    'spec_value' => '170'],
                    ['spec_key' => 'length_mm',   'spec_value' => '282'],
                    ['spec_key' => 'pcie_version','spec_value' => 'PCIe 4.0'],
                ],
            ],
        ];

        foreach ($components as $data) {
            $this->create('gpu', $data);
        }
    }

    private function seedStorage(): void
    {
        $components = [
            [
                'name' => 'Samsung 990 Pro 2TB NVMe', 'brand' => 'Samsung', 'model' => '990 Pro 2TB',
                'price' => 199.00, 'wattage' => 7,
                'image_url' => 'https://m.media-amazon.com/images/I/61n6JpnDwTL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'interface',   'spec_value' => 'NVMe M.2'],
                    ['spec_key' => 'capacity_gb', 'spec_value' => '2000'],
                ],
            ],
            [
                'name' => 'Samsung 990 Pro 1TB NVMe', 'brand' => 'Samsung', 'model' => '990 Pro 1TB',
                'price' => 109.00, 'wattage' => 6,
                'image_url' => 'https://m.media-amazon.com/images/I/71ZNteKMZ3L._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'interface',   'spec_value' => 'NVMe M.2'],
                    ['spec_key' => 'capacity_gb', 'spec_value' => '1000'],
                ],
            ],
            [
                'name' => 'WD Black SN850X 2TB', 'brand' => 'WD', 'model' => 'Black SN850X 2TB',
                'price' => 189.00, 'wattage' => 7,
                'image_url' => 'https://m.media-amazon.com/images/I/51BKz4MSBKL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'interface',   'spec_value' => 'NVMe M.2'],
                    ['spec_key' => 'capacity_gb', 'spec_value' => '2000'],
                ],
            ],
            [
                'name' => 'WD Black SN850X 1TB', 'brand' => 'WD', 'model' => 'Black SN850X 1TB',
                'price' => 99.00, 'wattage' => 6,
                'image_url' => 'https://m.media-amazon.com/images/I/61d3Xe2FIKL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'interface',   'spec_value' => 'NVMe M.2'],
                    ['spec_key' => 'capacity_gb', 'spec_value' => '1000'],
                ],
            ],
            [
                'name' => 'Seagate FireCuda 530 2TB', 'brand' => 'Seagate', 'model' => 'FireCuda 530 2TB',
                'price' => 179.00, 'wattage' => 7,
                'image_url' => 'https://m.media-amazon.com/images/I/61zLMzrSSBL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'interface',   'spec_value' => 'NVMe M.2'],
                    ['spec_key' => 'capacity_gb', 'spec_value' => '2000'],
                ],
            ],
            [
                'name' => 'Seagate FireCuda 530 1TB', 'brand' => 'Seagate', 'model' => 'FireCuda 530 1TB',
                'price' => 89.00, 'wattage' => 6,
                'image_url' => 'https://m.media-amazon.com/images/I/51xKgFRbNGL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'interface',   'spec_value' => 'NVMe M.2'],
                    ['spec_key' => 'capacity_gb', 'spec_value' => '1000'],
                ],
            ],
            [
                'name' => 'Crucial P5 Plus 2TB', 'brand' => 'Crucial', 'model' => 'P5 Plus 2TB',
                'price' => 139.00, 'wattage' => 7,
                'image_url' => 'https://m.media-amazon.com/images/I/61VsJLnvwXL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'interface',   'spec_value' => 'NVMe M.2'],
                    ['spec_key' => 'capacity_gb', 'spec_value' => '2000'],
                ],
            ],
            [
                'name' => 'Corsair MP600 PRO XT 2TB', 'brand' => 'Corsair', 'model' => 'MP600 PRO XT 2TB',
                'price' => 169.00, 'wattage' => 7,
                'image_url' => 'https://m.media-amazon.com/images/I/61N0JBWJXL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'interface',   'spec_value' => 'NVMe M.2'],
                    ['spec_key' => 'capacity_gb', 'spec_value' => '2000'],
                ],
            ],
            [
                'name' => 'Kingston KC3000 2TB', 'brand' => 'Kingston', 'model' => 'KC3000 2TB',
                'price' => 159.00, 'wattage' => 7,
                'image_url' => 'https://m.media-amazon.com/images/I/51q8sVErdnL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'interface',   'spec_value' => 'NVMe M.2'],
                    ['spec_key' => 'capacity_gb', 'spec_value' => '2000'],
                ],
            ],
            [
                'name' => 'Samsung 870 EVO 2TB SATA', 'brand' => 'Samsung', 'model' => '870 EVO 2TB',
                'price' => 149.00, 'wattage' => 3,
                'image_url' => 'https://m.media-amazon.com/images/I/61N0wRb5VL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'interface',   'spec_value' => 'SATA SSD'],
                    ['spec_key' => 'capacity_gb', 'spec_value' => '2000'],
                ],
            ],
            [
                'name' => 'Samsung 870 EVO 1TB SATA', 'brand' => 'Samsung', 'model' => '870 EVO 1TB',
                'price' => 89.00, 'wattage' => 3,
                'image_url' => 'https://m.media-amazon.com/images/I/71Li3U8KQAL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'interface',   'spec_value' => 'SATA SSD'],
                    ['spec_key' => 'capacity_gb', 'spec_value' => '1000'],
                ],
            ],
            [
                'name' => 'WD Blue SN580 1TB', 'brand' => 'WD', 'model' => 'Blue SN580 1TB',
                'price' => 79.00, 'wattage' => 6,
                'image_url' => 'https://m.media-amazon.com/images/I/71KUgJmmLAL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'interface',   'spec_value' => 'NVMe M.2'],
                    ['spec_key' => 'capacity_gb', 'spec_value' => '1000'],
                ],
            ],
            [
                'name' => 'Crucial MX500 2TB SATA', 'brand' => 'Crucial', 'model' => 'MX500 2TB',
                'price' => 129.00, 'wattage' => 3,
                'image_url' => 'https://m.media-amazon.com/images/I/61d5LPRWQML._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'interface',   'spec_value' => 'SATA SSD'],
                    ['spec_key' => 'capacity_gb', 'spec_value' => '2000'],
                ],
            ],
            [
                'name' => 'Seagate Barracuda 4TB HDD', 'brand' => 'Seagate', 'model' => 'Barracuda 4TB',
                'price' => 89.00, 'wattage' => 8,
                'image_url' => 'https://m.media-amazon.com/images/I/51BjVNMhGQL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'interface',   'spec_value' => 'SATA HDD'],
                    ['spec_key' => 'capacity_gb', 'spec_value' => '4000'],
                ],
            ],
            [
                'name' => 'WD Red Plus 6TB HDD', 'brand' => 'WD', 'model' => 'Red Plus 6TB',
                'price' => 149.00, 'wattage' => 8,
                'image_url' => 'https://m.media-amazon.com/images/I/61V58nNVrKL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'interface',   'spec_value' => 'SATA HDD'],
                    ['spec_key' => 'capacity_gb', 'spec_value' => '6000'],
                ],
            ],
        ];

        foreach ($components as $data) {
            $this->create('storage', $data);
        }
    }

    private function seedPsus(): void
    {
        $components = [
            [
                'name' => 'Corsair RM1000x', 'brand' => 'Corsair', 'model' => 'RM1000x',
                'price' => 179.00, 'wattage' => 0,
                'image_url' => 'https://m.media-amazon.com/images/I/81sBnfpd5RL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'wattage_max',   'spec_value' => '1000'],
                    ['spec_key' => 'form_factor',   'spec_value' => 'ATX'],
                    ['spec_key' => 'certification', 'spec_value' => '80+ Gold'],
                ],
            ],
            [
                'name' => 'Seasonic Focus GX-850', 'brand' => 'Seasonic', 'model' => 'Focus GX-850',
                'price' => 139.00, 'wattage' => 0,
                'image_url' => 'https://m.media-amazon.com/images/I/61c4ZwRK5QL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'wattage_max',   'spec_value' => '850'],
                    ['spec_key' => 'form_factor',   'spec_value' => 'ATX'],
                    ['spec_key' => 'certification', 'spec_value' => '80+ Gold'],
                ],
            ],
            [
                'name' => 'be quiet! Straight Power 11 1000W', 'brand' => 'be quiet!', 'model' => 'Straight Power 11 1000W',
                'price' => 199.00, 'wattage' => 0,
                'image_url' => 'https://m.media-amazon.com/images/I/61ZJQf6KKYL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'wattage_max',   'spec_value' => '1000'],
                    ['spec_key' => 'form_factor',   'spec_value' => 'ATX'],
                    ['spec_key' => 'certification', 'spec_value' => '80+ Platinum'],
                ],
            ],
            [
                'name' => 'Corsair RM750x', 'brand' => 'Corsair', 'model' => 'RM750x',
                'price' => 119.00, 'wattage' => 0,
                'image_url' => 'https://m.media-amazon.com/images/I/71GZjJv0jML._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'wattage_max',   'spec_value' => '750'],
                    ['spec_key' => 'form_factor',   'spec_value' => 'ATX'],
                    ['spec_key' => 'certification', 'spec_value' => '80+ Gold'],
                ],
            ],
            [
                'name' => 'Seasonic Focus GX-650', 'brand' => 'Seasonic', 'model' => 'Focus GX-650',
                'price' => 109.00, 'wattage' => 0,
                'image_url' => 'https://m.media-amazon.com/images/I/61BwcGF5jKL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'wattage_max',   'spec_value' => '650'],
                    ['spec_key' => 'form_factor',   'spec_value' => 'ATX'],
                    ['spec_key' => 'certification', 'spec_value' => '80+ Gold'],
                ],
            ],
            [
                'name' => 'be quiet! Dark Power 13 1000W', 'brand' => 'be quiet!', 'model' => 'Dark Power 13 1000W',
                'price' => 259.00, 'wattage' => 0,
                'image_url' => 'https://m.media-amazon.com/images/I/61kn3rxFGML._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'wattage_max',   'spec_value' => '1000'],
                    ['spec_key' => 'form_factor',   'spec_value' => 'ATX'],
                    ['spec_key' => 'certification', 'spec_value' => '80+ Titanium'],
                ],
            ],
            [
                'name' => 'Corsair HX1200', 'brand' => 'Corsair', 'model' => 'HX1200',
                'price' => 229.00, 'wattage' => 0,
                'image_url' => 'https://m.media-amazon.com/images/I/81hPAZvJxL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'wattage_max',   'spec_value' => '1200'],
                    ['spec_key' => 'form_factor',   'spec_value' => 'ATX'],
                    ['spec_key' => 'certification', 'spec_value' => '80+ Platinum'],
                ],
            ],
            [
                'name' => 'Seasonic Focus GX-550', 'brand' => 'Seasonic', 'model' => 'Focus GX-550',
                'price' => 95.00, 'wattage' => 0,
                'image_url' => 'https://m.media-amazon.com/images/I/61KR8bW0eIL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'wattage_max',   'spec_value' => '550'],
                    ['spec_key' => 'form_factor',   'spec_value' => 'ATX'],
                    ['spec_key' => 'certification', 'spec_value' => '80+ Gold'],
                ],
            ],
            [
                'name' => 'Seasonic Prime TX-1000', 'brand' => 'Seasonic', 'model' => 'Prime TX-1000',
                'price' => 279.00, 'wattage' => 0,
                'image_url' => 'https://m.media-amazon.com/images/I/61BZJqHOxL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'wattage_max',   'spec_value' => '1000'],
                    ['spec_key' => 'form_factor',   'spec_value' => 'ATX'],
                    ['spec_key' => 'certification', 'spec_value' => '80+ Titanium'],
                ],
            ],
            [
                'name' => 'Corsair SF750', 'brand' => 'Corsair', 'model' => 'SF750',
                'price' => 149.00, 'wattage' => 0,
                'image_url' => 'https://m.media-amazon.com/images/I/71GZjJv0jML._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'wattage_max',   'spec_value' => '750'],
                    ['spec_key' => 'form_factor',   'spec_value' => 'SFX'],
                    ['spec_key' => 'certification', 'spec_value' => '80+ Platinum'],
                ],
            ],
            [
                'name' => 'Seasonic Focus SGX-650', 'brand' => 'Seasonic', 'model' => 'Focus SGX-650',
                'price' => 129.00, 'wattage' => 0,
                'image_url' => 'https://m.media-amazon.com/images/I/71JV5nQvLtL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'wattage_max',   'spec_value' => '650'],
                    ['spec_key' => 'form_factor',   'spec_value' => 'SFX'],
                    ['spec_key' => 'certification', 'spec_value' => '80+ Gold'],
                ],
            ],
            [
                'name' => 'MSI MAG A850GL', 'brand' => 'MSI', 'model' => 'MAG A850GL',
                'price' => 129.00, 'wattage' => 0,
                'image_url' => 'https://m.media-amazon.com/images/I/61xHBQxkAL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'wattage_max',   'spec_value' => '850'],
                    ['spec_key' => 'form_factor',   'spec_value' => 'ATX'],
                    ['spec_key' => 'certification', 'spec_value' => '80+ Gold'],
                ],
            ],
            [
                'name' => 'Gigabyte P850GM', 'brand' => 'Gigabyte', 'model' => 'P850GM',
                'price' => 109.00, 'wattage' => 0,
                'image_url' => 'https://m.media-amazon.com/images/I/71nH7pDqWiL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'wattage_max',   'spec_value' => '850'],
                    ['spec_key' => 'form_factor',   'spec_value' => 'ATX'],
                    ['spec_key' => 'certification', 'spec_value' => '80+ Gold'],
                ],
            ],
            [
                'name' => 'Thermaltake Toughpower GF3 1000W', 'brand' => 'Thermaltake', 'model' => 'Toughpower GF3 1000W',
                'price' => 159.00, 'wattage' => 0,
                'image_url' => 'https://m.media-amazon.com/images/I/61wvnfQlrL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'wattage_max',   'spec_value' => '1000'],
                    ['spec_key' => 'form_factor',   'spec_value' => 'ATX'],
                    ['spec_key' => 'certification', 'spec_value' => '80+ Gold'],
                ],
            ],
            [
                'name' => 'be quiet! Pure Power 12 M 750W', 'brand' => 'be quiet!', 'model' => 'Pure Power 12 M 750W',
                'price' => 99.00, 'wattage' => 0,
                'image_url' => 'https://m.media-amazon.com/images/I/61y0aCKJnL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'wattage_max',   'spec_value' => '750'],
                    ['spec_key' => 'form_factor',   'spec_value' => 'ATX'],
                    ['spec_key' => 'certification', 'spec_value' => '80+ Gold'],
                ],
            ],
        ];

        foreach ($components as $data) {
            $this->create('psu', $data);
        }
    }

    private function seedCases(): void
    {
        $components = [
            [
                'name' => 'Fractal Design Torrent', 'brand' => 'Fractal Design', 'model' => 'Torrent',
                'price' => 179.00, 'wattage' => 0,
                'image_url' => 'https://m.media-amazon.com/images/I/81MLqa1WCFL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'form_factor',          'spec_value' => 'ATX,Micro-ATX,Mini-ITX'],
                    ['spec_key' => 'max_gpu_length_mm',    'spec_value' => '461'],
                    ['spec_key' => 'max_cooler_height_mm', 'spec_value' => '188'],
                ],
            ],
            [
                'name' => 'Lian Li O11 Dynamic EVO', 'brand' => 'Lian Li', 'model' => 'O11 Dynamic EVO',
                'price' => 149.00, 'wattage' => 0,
                'image_url' => 'https://m.media-amazon.com/images/I/71oFEY7hJRL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'form_factor',          'spec_value' => 'ATX,Micro-ATX,Mini-ITX'],
                    ['spec_key' => 'max_gpu_length_mm',    'spec_value' => '426'],
                    ['spec_key' => 'max_cooler_height_mm', 'spec_value' => '167'],
                ],
            ],
            [
                'name' => 'be quiet! Dark Base 900 Pro', 'brand' => 'be quiet!', 'model' => 'Dark Base 900 Pro',
                'price' => 199.00, 'wattage' => 0,
                'image_url' => 'https://m.media-amazon.com/images/I/61WkFQmQL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'form_factor',          'spec_value' => 'ATX,Micro-ATX,Mini-ITX'],
                    ['spec_key' => 'max_gpu_length_mm',    'spec_value' => '449'],
                    ['spec_key' => 'max_cooler_height_mm', 'spec_value' => '185'],
                ],
            ],
            [
                'name' => 'NZXT H9 Flow', 'brand' => 'NZXT', 'model' => 'H9 Flow',
                'price' => 149.00, 'wattage' => 0,
                'image_url' => 'https://m.media-amazon.com/images/I/61X5JQFl0yL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'form_factor',          'spec_value' => 'ATX,Micro-ATX,Mini-ITX'],
                    ['spec_key' => 'max_gpu_length_mm',    'spec_value' => '400'],
                    ['spec_key' => 'max_cooler_height_mm', 'spec_value' => '170'],
                ],
            ],
            [
                'name' => 'Corsair 5000D Airflow', 'brand' => 'Corsair', 'model' => '5000D Airflow',
                'price' => 139.00, 'wattage' => 0,
                'image_url' => 'https://m.media-amazon.com/images/I/61x5H26IOKL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'form_factor',          'spec_value' => 'ATX,Micro-ATX,Mini-ITX'],
                    ['spec_key' => 'max_gpu_length_mm',    'spec_value' => '420'],
                    ['spec_key' => 'max_cooler_height_mm', 'spec_value' => '170'],
                ],
            ],
            [
                'name' => 'Fractal Design Define 7', 'brand' => 'Fractal Design', 'model' => 'Define 7',
                'price' => 169.00, 'wattage' => 0,
                'image_url' => 'https://m.media-amazon.com/images/I/81yAMC2KKEL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'form_factor',          'spec_value' => 'ATX,Micro-ATX,Mini-ITX'],
                    ['spec_key' => 'max_gpu_length_mm',    'spec_value' => '440'],
                    ['spec_key' => 'max_cooler_height_mm', 'spec_value' => '185'],
                ],
            ],
            [
                'name' => 'NZXT H7 Flow', 'brand' => 'NZXT', 'model' => 'H7 Flow',
                'price' => 129.00, 'wattage' => 0,
                'image_url' => 'https://m.media-amazon.com/images/I/71xS6M7y6vL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'form_factor',          'spec_value' => 'ATX,Micro-ATX,Mini-ITX'],
                    ['spec_key' => 'max_gpu_length_mm',    'spec_value' => '400'],
                    ['spec_key' => 'max_cooler_height_mm', 'spec_value' => '185'],
                ],
            ],
            [
                'name' => 'Cooler Master HAF 700 EVO', 'brand' => 'Cooler Master', 'model' => 'HAF 700 EVO',
                'price' => 249.00, 'wattage' => 0,
                'image_url' => 'https://m.media-amazon.com/images/I/81g4kEuHLtL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'form_factor',          'spec_value' => 'ATX,Micro-ATX,Mini-ITX'],
                    ['spec_key' => 'max_gpu_length_mm',    'spec_value' => '490'],
                    ['spec_key' => 'max_cooler_height_mm', 'spec_value' => '200'],
                ],
            ],
            [
                'name' => 'Phanteks Enthoo Pro 2', 'brand' => 'Phanteks', 'model' => 'Enthoo Pro 2',
                'price' => 179.00, 'wattage' => 0,
                'image_url' => 'https://m.media-amazon.com/images/I/81Ep6eMmOvL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'form_factor',          'spec_value' => 'ATX,Micro-ATX,Mini-ITX'],
                    ['spec_key' => 'max_gpu_length_mm',    'spec_value' => '503'],
                    ['spec_key' => 'max_cooler_height_mm', 'spec_value' => '200'],
                ],
            ],
            [
                'name' => 'be quiet! Pure Base 500DX', 'brand' => 'be quiet!', 'model' => 'Pure Base 500DX',
                'price' => 109.00, 'wattage' => 0,
                'image_url' => 'https://m.media-amazon.com/images/I/61n1YTFIJKL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'form_factor',          'spec_value' => 'ATX,Micro-ATX,Mini-ITX'],
                    ['spec_key' => 'max_gpu_length_mm',    'spec_value' => '369'],
                    ['spec_key' => 'max_cooler_height_mm', 'spec_value' => '190'],
                ],
            ],
            [
                'name' => 'Fractal Design Pop Air', 'brand' => 'Fractal Design', 'model' => 'Pop Air',
                'price' => 89.00, 'wattage' => 0,
                'image_url' => 'https://m.media-amazon.com/images/I/71ZbEQ0DKGL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'form_factor',          'spec_value' => 'ATX,Micro-ATX,Mini-ITX'],
                    ['spec_key' => 'max_gpu_length_mm',    'spec_value' => '360'],
                    ['spec_key' => 'max_cooler_height_mm', 'spec_value' => '160'],
                ],
            ],
            [
                'name' => 'Cooler Master MasterBox Q500L', 'brand' => 'Cooler Master', 'model' => 'MasterBox Q500L',
                'price' => 69.00, 'wattage' => 0,
                'image_url' => 'https://m.media-amazon.com/images/I/61mvJaRi8BL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'form_factor',          'spec_value' => 'Micro-ATX,Mini-ITX'],
                    ['spec_key' => 'max_gpu_length_mm',    'spec_value' => '360'],
                    ['spec_key' => 'max_cooler_height_mm', 'spec_value' => '157'],
                ],
            ],
            [
                'name' => 'Silverstone SUGO 14', 'brand' => 'Silverstone', 'model' => 'SUGO 14',
                'price' => 99.00, 'wattage' => 0,
                'image_url' => 'https://m.media-amazon.com/images/I/71w7KdyNHL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'form_factor',          'spec_value' => 'Micro-ATX,Mini-ITX'],
                    ['spec_key' => 'max_gpu_length_mm',    'spec_value' => '340'],
                    ['spec_key' => 'max_cooler_height_mm', 'spec_value' => '130'],
                ],
            ],
            [
                'name' => 'NZXT H5 Flow', 'brand' => 'NZXT', 'model' => 'H5 Flow',
                'price' => 99.00, 'wattage' => 0,
                'image_url' => 'https://m.media-amazon.com/images/I/71JmBq1LL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'form_factor',          'spec_value' => 'ATX,Micro-ATX,Mini-ITX'],
                    ['spec_key' => 'max_gpu_length_mm',    'spec_value' => '365'],
                    ['spec_key' => 'max_cooler_height_mm', 'spec_value' => '165'],
                ],
            ],
            [
                'name' => 'Lian Li PC-O11 Air', 'brand' => 'Lian Li', 'model' => 'PC-O11 Air',
                'price' => 119.00, 'wattage' => 0,
                'image_url' => 'https://m.media-amazon.com/images/I/81HJJqGBIHL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'form_factor',          'spec_value' => 'ATX,Micro-ATX,Mini-ITX'],
                    ['spec_key' => 'max_gpu_length_mm',    'spec_value' => '420'],
                    ['spec_key' => 'max_cooler_height_mm', 'spec_value' => '155'],
                ],
            ],
        ];

        foreach ($components as $data) {
            $this->create('case', $data);
        }
    }

    private function seedCoolers(): void
    {
        $components = [
            [
                'name' => 'Noctua NH-D15', 'brand' => 'Noctua', 'model' => 'NH-D15',
                'price' => 99.00, 'wattage' => 5,
                'image_url' => 'https://m.media-amazon.com/images/I/61f2sFJMajL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket_compat', 'spec_value' => 'LGA1700,AM5,AM4'],
                    ['spec_key' => 'height_mm',     'spec_value' => '165'],
                    ['spec_key' => 'max_tdp',       'spec_value' => '250'],
                ],
            ],
            [
                'name' => 'be quiet! Dark Rock Pro 4', 'brand' => 'be quiet!', 'model' => 'Dark Rock Pro 4',
                'price' => 89.00, 'wattage' => 5,
                'image_url' => 'https://m.media-amazon.com/images/I/61ZLZr7MnBL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket_compat', 'spec_value' => 'LGA1700,AM4'],
                    ['spec_key' => 'height_mm',     'spec_value' => '162'],
                    ['spec_key' => 'max_tdp',       'spec_value' => '250'],
                ],
            ],
            [
                'name' => 'Cooler Master Hyper 212 Black', 'brand' => 'Cooler Master', 'model' => 'Hyper 212 Black',
                'price' => 39.00, 'wattage' => 4,
                'image_url' => 'https://m.media-amazon.com/images/I/61SzUlHn5RL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket_compat', 'spec_value' => 'LGA1700,AM5,AM4'],
                    ['spec_key' => 'height_mm',     'spec_value' => '160'],
                    ['spec_key' => 'max_tdp',       'spec_value' => '150'],
                ],
            ],
            [
                'name' => 'Noctua NH-U12S Redux', 'brand' => 'Noctua', 'model' => 'NH-U12S Redux',
                'price' => 49.00, 'wattage' => 4,
                'image_url' => 'https://m.media-amazon.com/images/I/61vEsJjZJ8L._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket_compat', 'spec_value' => 'LGA1700,AM5,AM4'],
                    ['spec_key' => 'height_mm',     'spec_value' => '158'],
                    ['spec_key' => 'max_tdp',       'spec_value' => '180'],
                ],
            ],
            [
                'name' => 'Thermalright Peerless Assassin 120 SE', 'brand' => 'Thermalright', 'model' => 'Peerless Assassin 120 SE',
                'price' => 35.00, 'wattage' => 4,
                'image_url' => 'https://m.media-amazon.com/images/I/71-6wNBuJbL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket_compat', 'spec_value' => 'LGA1700,AM5,AM4'],
                    ['spec_key' => 'height_mm',     'spec_value' => '155'],
                    ['spec_key' => 'max_tdp',       'spec_value' => '260'],
                ],
            ],
            [
                'name' => 'DeepCool AK620', 'brand' => 'DeepCool', 'model' => 'AK620',
                'price' => 49.00, 'wattage' => 4,
                'image_url' => 'https://m.media-amazon.com/images/I/81tL0x1hML._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket_compat', 'spec_value' => 'LGA1700,AM5,AM4'],
                    ['spec_key' => 'height_mm',     'spec_value' => '160'],
                    ['spec_key' => 'max_tdp',       'spec_value' => '260'],
                ],
            ],
            [
                'name' => 'NZXT Kraken X53 240mm AIO', 'brand' => 'NZXT', 'model' => 'Kraken X53',
                'price' => 119.00, 'wattage' => 8,
                'image_url' => 'https://m.media-amazon.com/images/I/61PbYYj9NFL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket_compat', 'spec_value' => 'LGA1700,AM5,AM4'],
                    ['spec_key' => 'height_mm',     'spec_value' => '30'],
                    ['spec_key' => 'max_tdp',       'spec_value' => '250'],
                ],
            ],
            [
                'name' => 'Corsair H100x Elite 240mm AIO', 'brand' => 'Corsair', 'model' => 'H100x Elite',
                'price' => 129.00, 'wattage' => 8,
                'image_url' => 'https://m.media-amazon.com/images/I/71cQ3KMGPYL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket_compat', 'spec_value' => 'LGA1700,AM5,AM4'],
                    ['spec_key' => 'height_mm',     'spec_value' => '30'],
                    ['spec_key' => 'max_tdp',       'spec_value' => '300'],
                ],
            ],
            [
                'name' => 'be quiet! Pure Loop 2 FX 240mm', 'brand' => 'be quiet!', 'model' => 'Pure Loop 2 FX 240mm',
                'price' => 109.00, 'wattage' => 8,
                'image_url' => 'https://m.media-amazon.com/images/I/61D0MSHML._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket_compat', 'spec_value' => 'LGA1700,AM5,AM4'],
                    ['spec_key' => 'height_mm',     'spec_value' => '30'],
                    ['spec_key' => 'max_tdp',       'spec_value' => '280'],
                ],
            ],
            [
                'name' => 'NZXT Kraken X73 360mm AIO', 'brand' => 'NZXT', 'model' => 'Kraken X73',
                'price' => 169.00, 'wattage' => 10,
                'image_url' => 'https://m.media-amazon.com/images/I/71RMbZKMNSL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket_compat', 'spec_value' => 'LGA1700,AM5,AM4'],
                    ['spec_key' => 'height_mm',     'spec_value' => '30'],
                    ['spec_key' => 'max_tdp',       'spec_value' => '350'],
                ],
            ],
            [
                'name' => 'Arctic Liquid Freezer III 360', 'brand' => 'Arctic', 'model' => 'Liquid Freezer III 360',
                'price' => 109.00, 'wattage' => 10,
                'image_url' => 'https://m.media-amazon.com/images/I/71g7xJNAL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket_compat', 'spec_value' => 'LGA1700,AM5,AM4'],
                    ['spec_key' => 'height_mm',     'spec_value' => '30'],
                    ['spec_key' => 'max_tdp',       'spec_value' => '300'],
                ],
            ],
            [
                'name' => 'Scythe Fuma 3', 'brand' => 'Scythe', 'model' => 'Fuma 3',
                'price' => 59.00, 'wattage' => 4,
                'image_url' => 'https://m.media-amazon.com/images/I/71upYpBOQL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket_compat', 'spec_value' => 'LGA1700,AM5,AM4'],
                    ['spec_key' => 'height_mm',     'spec_value' => '154'],
                    ['spec_key' => 'max_tdp',       'spec_value' => '220'],
                ],
            ],
            [
                'name' => 'Cooler Master MasterLiquid 360L Core', 'brand' => 'Cooler Master', 'model' => 'MasterLiquid 360L Core',
                'price' => 99.00, 'wattage' => 10,
                'image_url' => 'https://m.media-amazon.com/images/I/71iT6T0JTNL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket_compat', 'spec_value' => 'LGA1700,AM5,AM4'],
                    ['spec_key' => 'height_mm',     'spec_value' => '30'],
                    ['spec_key' => 'max_tdp',       'spec_value' => '300'],
                ],
            ],
            [
                'name' => 'be quiet! Shadow Rock 3', 'brand' => 'be quiet!', 'model' => 'Shadow Rock 3',
                'price' => 49.00, 'wattage' => 4,
                'image_url' => 'https://m.media-amazon.com/images/I/61XRr3HZDGL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket_compat', 'spec_value' => 'LGA1700,AM5,AM4'],
                    ['spec_key' => 'height_mm',     'spec_value' => '160'],
                    ['spec_key' => 'max_tdp',       'spec_value' => '190'],
                ],
            ],
            [
                'name' => 'Noctua NH-L9a-AM5 (Low Profile)', 'brand' => 'Noctua', 'model' => 'NH-L9a-AM5',
                'price' => 55.00, 'wattage' => 3,
                'image_url' => 'https://m.media-amazon.com/images/I/61Dc8jtQ8yL._AC_SL1500_.jpg',
                'specs' => [
                    ['spec_key' => 'socket_compat', 'spec_value' => 'AM5'],
                    ['spec_key' => 'height_mm',     'spec_value' => '37'],
                    ['spec_key' => 'max_tdp',       'spec_value' => '65'],
                ],
            ],
        ];

        foreach ($components as $data) {
            $this->create('cpu-cooler', $data);
        }
    }
}
