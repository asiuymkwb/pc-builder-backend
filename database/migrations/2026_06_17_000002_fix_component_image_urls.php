<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $base = 'https://c1.neweggimages.com/productimage/nb640/';

        $urls = [
            // CPUs
            'Intel Core i9-14900K'                      => $base . '19-118-462-03.jpg',
            'Intel Core i7-14700K'                      => $base . '19-118-466-04.jpg',
            'Intel Core i5-14600K'                      => $base . '19-118-470-07.jpg',
            'Intel Core i3-14100'                       => $base . '19-118-483-01.jpg',
            'Intel Core i5-13600K'                      => $base . '19-118-416-V01.jpg',
            'Intel Core i5-12400F'                      => $base . '19-118-360-08.jpg',
            'Intel Core i9-12900K'                      => $base . '19-118-339-08.jpg',
            'AMD Ryzen 9 7950X'                         => $base . '19-113-771-09.jpg',
            'AMD Ryzen 9 7900X'                         => $base . '19-113-769-02.jpg',
            'AMD Ryzen 7 7700X'                         => $base . '19-113-768-01.jpg',
            'AMD Ryzen 5 7600X'                         => $base . '19-113-785-04.png',
            'AMD Ryzen 5 7600'                          => $base . 'BDKWS2508061BDYNP8A.jpg',
            'AMD Ryzen 5 5600X'                         => $base . '19-113-670-V01.jpg',
            'AMD Ryzen 7 5800X3D'                       => $base . '19-113-734-05.jpg',
            'AMD Ryzen 9 5950X'                         => $base . '19-113-663-V01.jpg',

            // GPUs
            'ASUS ROG STRIX RTX 4090 OC'                => $base . '14-126-593-V01.jpg',
            'MSI Gaming Trio RTX 4080 Super'            => $base . '14-137-766-01.jpg',
            'Gigabyte AORUS RTX 4070 Ti Super'          => $base . '14-932-674-11.jpg',
            'ASUS TUF RTX 4070 Super OC'                => $base . '14-126-697-18.png',
            'MSI Ventus 3X RTX 4070'                    => $base . '14-137-791-01.jpg',
            'ASUS Dual RTX 4060 Ti OC'                  => $base . '14-126-647-V02.jpg',
            'MSI Gaming X RTX 4060'                     => $base . '14-137-805-01.jpg',
            'Sapphire NITRO+ RX 7900 XTX'               => $base . '14-202-428-V02.jpg',
            'PowerColor Red Devil RX 7900 XT'           => $base . '14-131-813-01.png',
            'MSI Gaming RX 7800 XT'                     => $base . '14-202-433-16.jpg',
            'Sapphire Pulse RX 7700 XT'                 => $base . '14-202-436-11.jpg',
            'PowerColor Fighter RX 7600'                => $base . '14-131-816-03.jpg',
            'ASUS TUF RTX 3080 10GB'                    => $base . '14-126-452-01.jpg',
            'MSI Suprim X RTX 3070 Ti'                  => $base . 'ARUXS2111230HG5IABA.jpg',
            'Gigabyte Gaming OC RTX 3060'               => $base . '14-932-402-V01.jpg',

            // Motherboards
            'ASUS ROG MAXIMUS Z790 HERO'                => $base . '13-119-597-V01.jpg',
            'MSI MAG Z790 TOMAHAWK WIFI'                => $base . '13-144-567-17.png',
            'Gigabyte Z790 AORUS ELITE AX'              => $base . '13-145-417-01.jpg',
            'ASUS PRIME Z790-P WIFI'                    => $base . '13-119-603-01.jpg',
            'MSI PRO Z790-A WIFI DDR4'                  => $base . '13-144-570-15.jpg',
            'ASUS ROG CROSSHAIR X670E HERO'             => $base . '13-119-582-39.png',
            'MSI MEG X670E ACE'                         => $base . '13-144-549-12.jpg',
            'ASUS TUF GAMING X670E-PLUS WIFI'           => $base . '13-119-591-15.jpg',
            'Gigabyte X670E AORUS MASTER'               => $base . '13-145-485-01.png',
            'MSI MAG B650 TOMAHAWK WIFI'                => $base . '13-144-557-08.jpg',
            'ASUS ROG STRIX B550-F GAMING WIFI'         => $base . '13-119-311-V03.jpg',
            'MSI MAG B550 TOMAHAWK'                     => $base . '13-144-326-V01.jpg',
            'Gigabyte B550 AORUS PRO AX'                => $base . '13-145-248-V01.jpg',
            'ASUS PRIME B660M-A D4'                     => $base . '13-119-541-V01.jpg',
            'MSI MAG B660M MORTAR WIFI DDR4'            => $base . '13-144-522-V01.jpg',

            // RAM
            'Corsair Vengeance DDR5-5600 32GB'          => $base . '20-236-828-V01.jpg',
            'G.Skill Trident Z5 DDR5-6000 32GB'         => $base . '20-374-351-V01.jpg',
            'Kingston Fury Beast DDR5-5200 16GB'        => $base . '20-242-647-V01.jpg',
            'Corsair Vengeance DDR5-4800 32GB'          => $base . '20-236-826-V01.jpg',
            'G.Skill Ripjaws S5 DDR5-6000 64GB'         => $base . '20-374-468-V01.jpg',
            'Corsair Vengeance LPX DDR4-3200 16GB'      => $base . '20-236-540-V01.jpg',
            'G.Skill Trident Z Neo DDR4-3600 32GB'      => $base . '20-232-860-V01.jpg',
            'Kingston Fury Beast DDR4-3200 32GB'        => $base . '20-242-586-V01.jpg',
            'Corsair Vengeance RGB Pro DDR4-3600 16GB'  => $base . '20-236-606-V01.jpg',
            'G.Skill Ripjaws V DDR4-3200 64GB'          => $base . '20-232-782-V01.jpg',
            'Crucial DDR5-4800 16GB'                    => $base . '20-156-284-V01.jpg',
            'TeamGroup T-Force Delta DDR5-6000 32GB'    => $base . '20-331-845-V01.jpg',
            'Kingston Fury Renegade DDR5-6000 32GB'     => $base . '20-242-725-V01.jpg',
            'Corsair Dominator Platinum DDR5-5600 64GB' => $base . '20-236-935-V01.jpg',
            'G.Skill Aegis DDR4-3000 16GB'              => $base . '20-232-728-V01.jpg',

            // Storage
            'Samsung 990 Pro 2TB'                       => $base . '20-147-861-V01.jpg',
            'Samsung 990 Pro 1TB'                       => $base . '20-147-860-V01.jpg',
            'WD Black SN850X 2TB'                       => $base . '20-250-247-V01.jpg',
            'WD Black SN850X 1TB'                       => $base . '20-250-243-V01.jpg',
            'Seagate FireCuda 530 2TB'                  => $base . '20-248-194-V01.jpg',
            'Seagate FireCuda 530 1TB'                  => $base . '20-248-193-V01.jpg',
            'Crucial P5 Plus 2TB'                       => $base . '20-156-281-V01.jpg',
            'Corsair MP600 PRO XT 2TB'                  => $base . '20-236-813-V01.jpg',
            'Kingston KC3000 2TB'                       => $base . '20-242-660-V01.jpg',
            'Samsung 870 EVO 2TB'                       => $base . '20-147-794-V01.jpg',
            'Samsung 870 EVO 1TB'                       => $base . '20-147-793-V01.jpg',
            'WD Blue SN580 1TB'                         => $base . '20-250-254-V01.jpg',
            'Crucial MX500 2TB'                         => $base . '20-156-175-V01.jpg',
            'Seagate Barracuda 4TB'                     => $base . '22-179-299-V01.jpg',
            'WD Red Plus 6TB'                           => $base . '22-234-534-V01.jpg',

            // PSU
            'Corsair RM1000x'                           => $base . '17-139-334-V01.jpg',
            'Seasonic Focus GX-850'                     => $base . '17-151-188-V01.jpg',
            'be quiet! Straight Power 11 1000W'         => $base . '17-856-073-V01.jpg',
            'Corsair RM750x'                            => $base . '17-139-272-V01.jpg',
            'Seasonic Focus GX-650'                     => $base . '17-151-186-V01.jpg',
            'be quiet! Dark Power 13 1000W'             => $base . '17-856-079-V01.jpg',
            'Corsair HX1200'                            => $base . '17-139-205-V01.jpg',
            'Seasonic Prime TX-1000'                    => $base . '17-151-195-V01.jpg',
            'Corsair SF750'                             => $base . '17-139-080-V01.jpg',
            'Seasonic Focus SGX-650'                    => $base . '17-151-224-V01.jpg',
            'MSI MAG A850GL'                            => $base . '17-701-021-V01.jpg',
            'Gigabyte P850GM'                           => $base . '17-233-032-V01.jpg',
            'Thermaltake Toughpower GF3 1000W'          => $base . '17-153-437-V01.jpg',
            'be quiet! Pure Power 12 M 750W'            => $base . '17-856-069-V01.jpg',

            // Cases
            'Fractal Design Torrent'                    => $base . '11-352-144-V01.jpg',
            'Lian Li O11 Dynamic EVO'                   => $base . '11-146-370-V01.jpg',
            'be quiet! Dark Base 900 Pro'               => $base . 'A68VS2402200WE1W0F0.jpg',
            'NZXT H9 Flow'                              => $base . '11-146-370-V01.jpg',
            'Corsair 5000D Airflow'                     => $base . '11-139-161-V01.jpg',
            'Fractal Design Define 7'                   => $base . '11-352-109-V01.jpg',
            'NZXT H7 Flow'                              => $base . '11-146-361-V01.jpg',
            'Cooler Master HAF 700 EVO'                 => $base . '11-119-433-V01.jpg',
            'Phanteks Enthoo Pro 2'                     => $base . '11-854-098-V01.jpg',
            'be quiet! Pure Base 500DX'                 => $base . '11-734-018-01.jpg',
            'Fractal Design Pop Air'                    => $base . '11-352-168-V01.jpg',
            'Cooler Master MasterBox Q500L'             => $base . '11-119-370-V01.jpg',
            'Silverstone SUGO 14'                       => $base . '11-765-044-V01.jpg',
            'NZXT H5 Flow'                              => $base . '11-146-365-V01.jpg',
            'Lian Li PC-O11 Air'                        => $base . '11-146-361-V01.jpg',

            // Coolers
            'Noctua NH-D15'                             => $base . '35-608-045-V01.jpg',
            'be quiet! Dark Rock Pro 4'                 => $base . '35-856-072-V01.jpg',
            'Cooler Master Hyper 212 Black'             => $base . '35-103-330-V01.jpg',
            'Noctua NH-U12S Redux'                      => $base . '35-608-059-V01.jpg',
            'Thermalright Peerless Assassin 120 SE'     => $base . '35-856-200-V01.jpg',
            'DeepCool AK620'                            => $base . '35-856-200-V01.jpg',
            'NZXT Kraken X53 240mm AIO'                 => $base . '35-146-066-V08.jpg',
            'Corsair H100x Elite 240mm AIO'             => $base . '35-181-353-V01.jpg',
            'be quiet! Pure Loop 2 FX 240mm'            => $base . 'A68VS2207220KKYBL48.jpg',
            'NZXT Kraken X73 360mm AIO'                 => $base . '35-146-068-V01.jpg',
            'Arctic Liquid Freezer III 360'             => $base . '35-146-068-V01.jpg',
            'Scythe Fuma 3'                             => $base . '35-103-330-V01.jpg',
            'Cooler Master MasterLiquid 360L Core'      => $base . '35-103-355-V01.jpg',
            'be quiet! Shadow Rock 3'                   => $base . '35-856-072-V01.jpg',
            'Noctua NH-L9a-AM5'                        => $base . 'A4RES2303070JUEW962.jpg',
        ];

        foreach ($urls as $name => $url) {
            DB::table('components')->where('name', $name)->update(['image_url' => $url]);
        }
    }

    public function down(): void {}
};
