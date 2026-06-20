<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $base = 'https://c1.neweggimages.com/productimage/nb640/';
        $nb300 = 'https://c1.neweggimages.com/productimage/nb300/';

        $fixes = [
            // RAM — variante numerica invece di V01
            'G.Skill Trident Z5 DDR5-6000 32GB'         => $base . '20-374-351-01.jpg',
            'Kingston Fury Beast DDR5-5200 16GB'        => $base . 'BDFPD23052211H1NCF2.jpg',
            'G.Skill Ripjaws S5 DDR5-6000 64GB'         => $base . '20-374-468-01.jpg',
            'Kingston Fury Beast DDR4-3200 32GB'        => $base . '20-242-586-01.jpg',
            'TeamGroup T-Force Delta DDR5-6000 32GB'    => $base . '20-331-845-01.jpg',
            'Kingston Fury Renegade DDR5-6000 32GB'     => $base . '20-242-725-01.jpg',
            'Corsair Dominator Platinum DDR5-5600 64GB' => $base . '20-236-935-02.jpg',

            // Storage — variante corretta (01 / S01)
            'WD Black SN850X 2TB'       => $base . '20-250-247-01.jpg',
            'WD Black SN850X 1TB'       => $base . '20-250-243-01.jpg',
            'Seagate FireCuda 530 2TB'  => $base . '20-248-194-01.jpg',
            'Seagate FireCuda 530 1TB'  => $base . '20-248-193-S01.jpg',
            'Crucial P5 Plus 2TB'       => $base . '20-156-281-01.jpg',
            'Kingston KC3000 2TB'       => $base . '20-242-660-S01.jpg',
            'Samsung 870 EVO 1TB SATA'  => $base . '20-147-793-01.jpg',
            'WD Blue SN580 1TB'         => $base . '20-250-254-01.jpg',

            // PSU — varianti corrette
            'Corsair RM1000x'               => $base . '17-139-334-05.png',
            'Corsair SF750'                 => $base . '17-139-080-Z01.jpg',
            'MSI MAG A850GL'               => $base . '17-701-021-01.jpg',
            'Gigabyte P850GM'              => $base . '17-233-032-S01.jpg',
            'Thermaltake Toughpower GF3 1000W' => $base . '17-153-437-01.jpg',

            // Cases — variante numerica corretta
            'Fractal Design Torrent'    => $base . '11-352-144-01.jpg',
            'Lian Li O11 Dynamic EVO'  => $nb300 . '2AM-000Z-000C0-01.png',
            'NZXT H9 Flow'             => $base . '11-146-370-01.jpg',
            'NZXT H7 Flow'             => $base . '11-146-361-01.jpg',
            'NZXT H5 Flow'             => $base . '11-146-365-01.jpg',
            'Lian Li PC-O11 Air'       => $nb300 . '2AM-000Z-000C0-01.png',

            // Coolers — varianti corrette
            'Cooler Master Hyper 212 Black'      => $base . '35-103-329-V01.jpg',
            'Corsair H100x Elite 240mm AIO'      => $base . '35-181-353-01.jpg',
            'Scythe Fuma 3'                      => $base . 'A9ZHS2307070VCZX10C.jpg',
            'Cooler Master MasterLiquid 360L Core' => $base . '35-103-355-01.jpg',
            'be quiet! Shadow Rock 3'            => $base . '35-103-329-V01.jpg',
        ];

        foreach ($fixes as $name => $url) {
            DB::table('components')->where('name', $name)->update(['image_url' => $url]);
        }
    }

    public function down(): void {}
};
