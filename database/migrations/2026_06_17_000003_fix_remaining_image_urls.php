<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $base = 'https://c1.neweggimages.com/productimage/nb640/';

        $fixes = [
            // Storage — nomi nel DB hanno suffissi NVMe/SATA/HDD
            'Samsung 990 Pro 2TB NVMe'   => $base . '20-147-861-01.jpg',
            'Samsung 990 Pro 1TB NVMe'   => $base . '20-147-860-01.jpg',
            'Samsung 870 EVO 2TB SATA'   => $base . '20-147-794-V01.jpg',
            'Samsung 870 EVO 1TB SATA'   => $base . '20-147-793-V01.jpg',
            'Crucial MX500 2TB SATA'     => $base . '20-156-175-V01.jpg',
            'Seagate Barracuda 4TB HDD'  => $base . '22-179-299-V01.jpg',
            'WD Red Plus 6TB HDD'        => $base . '22-234-534-08.png',

            // PSU — be quiet! non disponibili su Newegg, URL corretti
            'be quiet! Straight Power 11 1000W' => $base . '17-139-205-V01.jpg',
            'be quiet! Dark Power 13 1000W'      => $base . 'A68VS2301270XTEZS9A.jpg',
            'be quiet! Pure Power 12 M 750W'     => $base . '17-222-036-01.jpg',
            'Seasonic Focus GX-550'              => $base . '17-151-186-V01.jpg',

            // Motherboard — variante corretta (01 non V01)
            'MSI MAG B660M MORTAR WIFI DDR4' => $base . '13-144-522-01.jpg',

            // Cooler — URL corretti dal fetch delle pagine prodotto
            'Noctua NH-U12S Redux'             => $base . 'AADYS2206300OAKIA1B.jpg',
            'be quiet! Dark Rock Pro 4'        => $base . '35-856-200-V01.jpg',
            'be quiet! Shadow Rock 3'          => $base . '35-103-330-V01.jpg',
            'Noctua NH-L9a-AM5 (Low Profile)'  => $base . 'A4RES2303070JUEW962.jpg',

            // Case — Silverstone SUGO 14 usa nb300 (marketplace)
            'Silverstone SUGO 14' => 'https://c1.neweggimages.com/productimage/nb300/A62VD21102012F7LF.jpg',
        ];

        foreach ($fixes as $name => $url) {
            DB::table('components')->where('name', $name)->update(['image_url' => $url]);
        }
    }

    public function down(): void {}
};
