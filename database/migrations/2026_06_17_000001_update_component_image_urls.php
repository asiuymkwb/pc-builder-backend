<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $images = [
            // ── CPU ────────────────────────────────────────────────────────────────
            'Intel Core i9-14900K'   => 'https://www.bhphotovideo.com/images/images2500x2500/intel_bx8071514900k_core_i9_14900k_desktop_processor_1772516.jpg',
            'Intel Core i7-14700K'   => 'https://www.bhphotovideo.com/images/images2500x2500/intel_bx8071514700k_core_i7_14700k_desktop_1772515.jpg',
            'Intel Core i5-14600K'   => 'https://www.bhphotovideo.com/images/images2500x2500/intel_bx8071514600k_core_i5_14600k_desktop_processor_1772514.jpg',
            'Intel Core i3-14100'    => 'https://www.bhphotovideo.com/images/images2500x2500/intel_bx8071514100_core_i3_14100_desktop_processor_1772510.jpg',
            'Intel Core i5-13600K'   => 'https://www.bhphotovideo.com/images/images2500x2500/intel_bx8071513600k_core_i5_13600k_desktop_processor_1741831.jpg',
            'AMD Ryzen 9 7950X'      => 'https://www.bhphotovideo.com/images/images2500x2500/amd_100_100000514wof_ryzen_9_7950x_desktop_processor_1700614.jpg',
            'AMD Ryzen 9 7900X'      => 'https://www.bhphotovideo.com/images/images2500x2500/amd_100_100000589wof_ryzen_9_7900x_desktop_processor_1700615.jpg',
            'AMD Ryzen 7 7700X'      => 'https://www.bhphotovideo.com/images/images2500x2500/amd_100_100000591wof_ryzen_7_7700x_desktop_processor_1700616.jpg',
            'AMD Ryzen 5 7600X'      => 'https://www.bhphotovideo.com/images/images2500x2500/amd_100_100000593wof_ryzen_5_7600x_desktop_processor_1700617.jpg',
            'AMD Ryzen 5 7600'       => 'https://www.bhphotovideo.com/images/images2500x2500/amd_100_100000252box_ryzen_5_7600_desktop_processor_1765133.jpg',
            'AMD Ryzen 5 5600X'      => 'https://www.bhphotovideo.com/images/images2500x2500/amd_100_100000065box_ryzen_5_5600x_desktop_processor_1598895.jpg',
            'AMD Ryzen 7 5800X3D'    => 'https://www.bhphotovideo.com/images/images2500x2500/amd_100_100000651wof_ryzen_7_5800x3d_desktop_processor_1722583.jpg',
            'Intel Core i9-12900K'   => 'https://www.bhphotovideo.com/images/images2500x2500/intel_bx8071512900k_core_i9_12900k_desktop_processor_1665751.jpg',
            'Intel Core i5-12400F'   => 'https://www.bhphotovideo.com/images/images2500x2500/intel_bx8071512400f_core_i5_12400f_desktop_processor_1703547.jpg',
            'AMD Ryzen 9 5950X'      => 'https://www.bhphotovideo.com/images/images2500x2500/amd_100_100000059wof_ryzen_9_5950x_desktop_processor_1598899.jpg',

            // ── MOTHERBOARD ────────────────────────────────────────────────────────
            'ASUS ROG MAXIMUS Z790 HERO'          => 'https://dlcdnwebimgs.asus.com/gain/5B8B6F20-8726-4C9F-9A20-F8AECF6E4ABE/w717/h525',
            'MSI MAG Z790 TOMAHAWK WIFI'          => 'https://asset.msi.com/resize/image/global/product/product_16_20221028171703_63597e8f8d2a3.png62405b38c58fe0cb4088db5.png/600.png',
            'Gigabyte Z790 AORUS ELITE AX'        => 'https://static.gigabyte.com/StaticFile/Image/Global/b49e3f4c6a5d2bd20b6a4cfb4700c0b0/Product/30100/png/800',
            'ASUS PRIME Z790-P WIFI'              => 'https://dlcdnwebimgs.asus.com/gain/D6688958-DBC8-4D4F-9B74-AC8D1EF56E81/w717/h525',
            'MSI PRO Z790-A WIFI DDR4'            => 'https://asset.msi.com/resize/image/global/product/product_16_20221028163820_6359779c6d01b.png62405b38c58fe0cb4088db5.png/600.png',
            'ASUS ROG CROSSHAIR X670E HERO'       => 'https://dlcdnwebimgs.asus.com/gain/FD2B0C1F-E7BE-48F6-9CFA-E9B40ECD76E6/w717/h525',
            'MSI MEG X670E ACE'                   => 'https://asset.msi.com/resize/image/global/product/product_16_20220914113347_63218c4b3ab43.png62405b38c58fe0cb4088db5.png/600.png',
            'Gigabyte X670E AORUS MASTER'         => 'https://static.gigabyte.com/StaticFile/Image/Global/6f7abeada8ec6b6f96dfd14caa7e8fd8/Product/30074/png/800',
            'ASUS TUF GAMING X670E-PLUS WIFI'     => 'https://dlcdnwebimgs.asus.com/gain/BD869B90-C4B1-41A2-9E0D-F30E2AA8D24B/w717/h525',
            'MSI MAG B650 TOMAHAWK WIFI'          => 'https://asset.msi.com/resize/image/global/product/product_16_20220907191226_631905fa7c22f.png62405b38c58fe0cb4088db5.png/600.png',
            'ASUS ROG STRIX B550-F GAMING WIFI'   => 'https://dlcdnwebimgs.asus.com/gain/97012BF3-DC0B-4DAC-A48E-9D96FF0FB45E/w717/h525',
            'MSI MAG B550 TOMAHAWK'               => 'https://asset.msi.com/resize/image/global/product/product_16_20200804154457_5f297059e57c5.png62405b38c58fe0cb4088db5.png/600.png',
            'Gigabyte B550 AORUS PRO AX'          => 'https://static.gigabyte.com/StaticFile/Image/Global/9d82ae6d28b3f7f8ed85b56e96a4a9cb/Product/26403/png/800',
            'ASUS PRIME B660M-A D4'               => 'https://dlcdnwebimgs.asus.com/gain/A5BB28F0-CF3F-4C1A-A621-3C1DD7B1EB72/w717/h525',
            'MSI MAG B660M MORTAR WIFI DDR4'      => 'https://asset.msi.com/resize/image/global/product/product_16_20211129170809_61a4e1a936c0a.png62405b38c58fe0cb4088db5.png/600.png',

            // ── RAM ─────────────────────────────────────────────────────────────────
            'Corsair Vengeance DDR5-5600 32GB'          => 'https://www.corsair.com/medias/sys_master/images/images/h32/h07/9919870533662/CMK32GX5M2B5600C36-Gallery-CorsairVengeanceDDR5-01.png',
            'G.Skill Trident Z5 DDR5-6000 32GB'         => 'https://www.gskill.com/images/products/1/354/354/org/F5-6000J3040G16GX2-TZ5K_1.jpg',
            'Kingston Fury Beast DDR5-5200 16GB'         => 'https://media.kingston.com/kingston/product/ktc-product-fury-memory-ddr5-beast-1-zm-lg.jpg',
            'Corsair Vengeance DDR5-4800 32GB'           => 'https://www.corsair.com/medias/sys_master/images/images/hf8/h77/9161691037726/CMK32GX5M2A4800C40-Gallery-CorsairVengeanceDDR5-01.png',
            'G.Skill Ripjaws S5 DDR5-6000 64GB'          => 'https://www.gskill.com/images/products/1/415/415/org/F5-6000J3040G32GX2-RS5K_1.jpg',
            'Corsair Vengeance LPX DDR4-3200 16GB'       => 'https://www.corsair.com/medias/sys_master/images/images/h61/h26/8848565477406/CMK16GX4M2E3200C16-Gallery-CorsairVengeaneLPXDDR4-01.png',
            'G.Skill Trident Z Neo DDR4-3600 32GB'       => 'https://www.gskill.com/images/products/1/224/224/org/F4-3600C18D-32GTZN_1.jpg',
            'Kingston Fury Beast DDR4-3200 32GB'          => 'https://media.kingston.com/kingston/product/ktc-product-fury-memory-ddr4-beast-1-zm-lg.jpg',
            'Corsair Vengeance RGB Pro DDR4-3600 16GB'    => 'https://www.corsair.com/medias/sys_master/images/images/hf8/h21/8848563838014/CMW16GX4M2D3600C18-Gallery-CorsairVengeanceRGBProDDR4-01.png',
            'G.Skill Ripjaws V DDR4-3200 64GB'            => 'https://www.gskill.com/images/products/1/142/142/org/F4-3200C16D-64GVK_1.jpg',
            'Crucial DDR5-4800 16GB'                      => 'https://www.crucial.com/content/dam/crucial/dram-products/desktop/images/product/crucial-ddr5-desktop-image.psd.transform/small-png/img.png',
            'TeamGroup T-Force Delta DDR5-6000 32GB'      => 'https://www.teamgroupinc.com/images/product/memory/t-force-delta-ddr5/t-force-delta-ddr5-01.jpg',
            'Kingston Fury Renegade DDR5-6000 32GB'       => 'https://media.kingston.com/kingston/product/ktc-product-fury-memory-ddr5-renegade-rgb-1-zm-lg.jpg',
            'Corsair Dominator Platinum DDR5-5600 64GB'   => 'https://www.corsair.com/medias/sys_master/images/images/h75/h5d/9919870238750/CMT64GX5M2B5600C40-Gallery-CorsairDominatorPlatinumRGBDDR5-01.png',
            'G.Skill Aegis DDR4-3000 16GB'                => 'https://www.gskill.com/images/products/1/46/46/org/F4-3000C16D-16GISB_1.jpg',

            // ── GPU ─────────────────────────────────────────────────────────────────
            'ASUS ROG STRIX RTX 4090 OC'         => 'https://dlcdnwebimgs.asus.com/gain/CDED57A6-DA3E-4726-9C1D-52F8E7F19CCF/w717/h525',
            'MSI Gaming Trio RTX 4080 Super'      => 'https://asset.msi.com/resize/image/global/product/product_16_20231208180140_6571cc942e69f.png62405b38c58fe0cb4088db5.png/600.png',
            'Gigabyte AORUS RTX 4070 Ti Super'    => 'https://static.gigabyte.com/StaticFile/Image/Global/c3399e5d2ec8085ce3bd49e1b48bebc2/Product/32717/png/800',
            'ASUS TUF RTX 4070 Super OC'          => 'https://dlcdnwebimgs.asus.com/gain/B30F41CC-8FA6-41B3-B9D4-82F8C09ADB7F/w717/h525',
            'MSI Ventus 3X RTX 4070'              => 'https://asset.msi.com/resize/image/global/product/product_16_20230113171503_63c1a1f7c94d0.png62405b38c58fe0cb4088db5.png/600.png',
            'ASUS Dual RTX 4060 Ti OC'            => 'https://dlcdnwebimgs.asus.com/gain/86E5B5CF-9CAC-441A-B46B-BC5CB5A81A2A/w717/h525',
            'MSI Gaming X RTX 4060'               => 'https://asset.msi.com/resize/image/global/product/product_16_20230524171714_646e3aaadc18b.png62405b38c58fe0cb4088db5.png/600.png',
            'Sapphire NITRO+ RX 7900 XTX'         => 'https://www.sapphiretech.com/productimage/1695285047-62757-nitro-rx-7900-xtx-p7-01-lg.png',
            'PowerColor Red Devil RX 7900 XT'     => 'https://www.powercolor.com/upload/1/Products/2023/RX-7900-XT-Red-Devil/RX-7900-XT-Red-Devil-main.png',
            'MSI Gaming RX 7800 XT'               => 'https://asset.msi.com/resize/image/global/product/product_16_20230822163218_64e4f102e57de.png62405b38c58fe0cb4088db5.png/600.png',
            'Sapphire Pulse RX 7700 XT'           => 'https://www.sapphiretech.com/productimage/1692864803-61218-pulse-rx-7700-xt-p7-01-lg.png',
            'PowerColor Fighter RX 7600'           => 'https://www.powercolor.com/upload/1/Products/2023/RX-7600-Fighter/RX-7600-Fighter-main.png',
            'ASUS TUF RTX 3080 10GB'              => 'https://dlcdnwebimgs.asus.com/gain/2A2AF5E8-E949-4E05-8C86-B55C5A4E1EB4/w717/h525',
            'MSI Suprim X RTX 3070 Ti'            => 'https://asset.msi.com/resize/image/global/product/product_16_20210531154039_60b48a173745b.png62405b38c58fe0cb4088db5.png/600.png',
            'Gigabyte Gaming OC RTX 3060'         => 'https://static.gigabyte.com/StaticFile/Image/Global/d7d8ef5a3b57b9ba7cf13ac1a36e9b1a/Product/27523/png/800',

            // ── STORAGE ─────────────────────────────────────────────────────────────
            'Samsung 990 Pro 2TB NVMe'   => 'https://images.samsung.com/is/image/samsung/p6pim/it/mz-v9p2t0bw/gallery/it-990-pro-nvme-ssd-mz-v9p2t0bw-540146059?$650_519_PNG$',
            'Samsung 990 Pro 1TB NVMe'   => 'https://images.samsung.com/is/image/samsung/p6pim/it/mz-v9p1t0bw/gallery/it-990-pro-nvme-ssd-mz-v9p1t0bw-540146046?$650_519_PNG$',
            'WD Black SN850X 2TB'        => 'https://shop.westerndigital.com/content/dam/store/en-us/assets/products/internal-storage/wd-black-sn850x-nvme-ssd/gallery/wd-black-sn850x-nvme-ssd-2TB-hero.png.thumb.319.319.png',
            'WD Black SN850X 1TB'        => 'https://shop.westerndigital.com/content/dam/store/en-us/assets/products/internal-storage/wd-black-sn850x-nvme-ssd/gallery/wd-black-sn850x-nvme-ssd-1TB-hero.png.thumb.319.319.png',
            'Seagate FireCuda 530 2TB'   => 'https://www.seagate.com/www-content/product-content/firecuda-fam/firecuda-530/en-us/images/seagate-firecuda-530-nvme-ssd-top-angle.png',
            'Seagate FireCuda 530 1TB'   => 'https://www.seagate.com/www-content/product-content/firecuda-fam/firecuda-530/en-us/images/seagate-firecuda-530-nvme-ssd-top-angle.png',
            'Crucial P5 Plus 2TB'        => 'https://www.crucial.com/content/dam/crucial/ssd-products/p5-plus/images/in-use/crucial-p5plus-ssd-image.psd.transform/small-png/img.png',
            'Corsair MP600 PRO XT 2TB'   => 'https://www.corsair.com/medias/sys_master/images/images/hb3/h3b/9131527503902/CSSD-F2000GBMP600PXT-Gallery-MP600PROXT-01.png',
            'Kingston KC3000 2TB'        => 'https://media.kingston.com/kingston/product/ktc-product-ssd-kc3000-1-zm-lg.jpg',
            'Samsung 870 EVO 2TB SATA'   => 'https://images.samsung.com/is/image/samsung/p6pim/it/mz-77e2t0b-eu/gallery/it-870-evo-sata-iii-2-5-ssd-mz-77e2t0b-eu-533549949?$650_519_PNG$',
            'Samsung 870 EVO 1TB SATA'   => 'https://images.samsung.com/is/image/samsung/p6pim/it/mz-77e1t0b-eu/gallery/it-870-evo-sata-iii-2-5-ssd-mz-77e1t0b-eu-533549943?$650_519_PNG$',
            'WD Blue SN580 1TB'          => 'https://shop.westerndigital.com/content/dam/store/en-us/assets/products/internal-storage/wd-blue-sn580-nvme-ssd/gallery/wd-blue-sn580-nvme-ssd-1TB-hero.png.thumb.319.319.png',
            'Crucial MX500 2TB SATA'     => 'https://www.crucial.com/content/dam/crucial/ssd-products/MX500/images/product/crucial-mx500-ssd-image.psd.transform/small-png/img.png',
            'Seagate Barracuda 4TB HDD'  => 'https://www.seagate.com/www-content/product-content/barracuda-fam/barracuda/en-us/images/barracuda-3-5-hard-drive-top-angle-1200x630.png',
            'WD Red Plus 6TB HDD'        => 'https://shop.westerndigital.com/content/dam/store/en-us/assets/products/internal-storage/wd-red-plus-sata-hdd/gallery/wd-red-plus-sata-hdd-6TB-hero.png.thumb.319.319.png',

            // ── PSU ─────────────────────────────────────────────────────────────────
            'Corsair RM1000x'                    => 'https://www.corsair.com/medias/sys_master/images/images/h59/h56/9131534934046/CP-9020206-EU-Gallery-RM1000x-01.png',
            'Seasonic Focus GX-850'              => 'https://seasonic.com/pub/media/catalog/product/f/o/focus-gx-14.png',
            'be quiet! Straight Power 11 1000W'  => 'https://www.bequiet.com/include/gd/resizeImage.php?image=/800/productImages/281/be_quiet_STRAIGHT_POWER_11_MAIN.jpg&width=600&height=600',
            'Corsair RM750x'                     => 'https://www.corsair.com/medias/sys_master/images/images/hfc/hf4/9131534999582/CP-9020199-EU-Gallery-RM750x-01.png',
            'Seasonic Focus GX-650'              => 'https://seasonic.com/pub/media/catalog/product/f/o/focus-gx-12.png',
            'be quiet! Dark Power 13 1000W'      => 'https://www.bequiet.com/include/gd/resizeImage.php?image=/800/productImages/433/bequiet_DARK_POWER_13_Main.jpg&width=600&height=600',
            'Corsair HX1200'                     => 'https://www.corsair.com/medias/sys_master/images/images/h77/hde/9131535065118/CP-9020140-EU-Gallery-HX1200-01.png',
            'Seasonic Focus GX-550'              => 'https://seasonic.com/pub/media/catalog/product/f/o/focus-gx-10.png',
            'Seasonic Prime TX-1000'             => 'https://seasonic.com/pub/media/catalog/product/p/r/prime-tx-02.png',
            'Corsair SF750'                      => 'https://www.corsair.com/medias/sys_master/images/images/h1d/h94/9131535196190/CP-9020186-EU-Gallery-SF750-01.png',
            'Seasonic Focus SGX-650'             => 'https://seasonic.com/pub/media/catalog/product/f/o/focus-sgx-02.png',
            'MSI MAG A850GL'                     => 'https://asset.msi.com/resize/image/global/product/product_16_20230809171038_64d3832eb4def.png62405b38c58fe0cb4088db5.png/600.png',
            'Gigabyte P850GM'                    => 'https://static.gigabyte.com/StaticFile/Image/Global/5b99c7d02c8a0adb32da39a5a2e52db9/Product/26682/png/800',
            'Thermaltake Toughpower GF3 1000W'   => 'https://www.thermaltake.com/pub/media/catalog/product/cache/image/700x700/e9c3970ab036de70892d86c6d92e6932/p/s/ps-tpd-1000fnfage-3.png',
            'be quiet! Pure Power 12 M 750W'     => 'https://www.bequiet.com/include/gd/resizeImage.php?image=/800/productImages/528/bequiet_PURE_POWER_12_M_MAIN.jpg&width=600&height=600',

            // ── CASE ─────────────────────────────────────────────────────────────────
            'Fractal Design Torrent'           => 'https://www.fractal-design.com/app/uploads/2022/02/Torrent-Black-TG-Dark-Tinted_front-1.png',
            'Lian Li O11 Dynamic EVO'          => 'https://www.lian-li.com/wp-content/uploads/2022/03/O11DEVO_Front-1.png',
            'be quiet! Dark Base 900 Pro'      => 'https://www.bequiet.com/include/gd/resizeImage.php?image=/800/productImages/127/be_quiet_DARK_BASE_900_MAIN.jpg&width=600&height=600',
            'NZXT H9 Flow'                     => 'https://nzxt.com/assets/cms/34299/1695405961-h9-flow-black-front.png',
            'Corsair 5000D Airflow'            => 'https://www.corsair.com/medias/sys_master/images/images/hba/h05/9131562680350/CC-9011210-WW-Gallery-5000D-Airflow-01.png',
            'Fractal Design Define 7'          => 'https://www.fractal-design.com/app/uploads/2020/02/Define-7-Black-TG-Dark-Tinted_front-left-1.png',
            'NZXT H7 Flow'                     => 'https://nzxt.com/assets/cms/34299/1677024083-h7-flow-black-front.png',
            'Cooler Master HAF 700 EVO'        => 'https://www.coolermaster.com/media/img/products/Cases/mcc-h700e-mg5n-s00/mcc-h700e-mg5n-s00_gallery_1.jpg',
            'Phanteks Enthoo Pro 2'            => 'https://www.phanteks.com/images/products/Enthoo_Pro2/gallery/Enthoo_Pro2_gal1.jpg',
            'be quiet! Pure Base 500DX'        => 'https://www.bequiet.com/include/gd/resizeImage.php?image=/800/productImages/273/be_quiet_PURE_BASE_500DX_MAIN.jpg&width=600&height=600',
            'Fractal Design Pop Air'           => 'https://www.fractal-design.com/app/uploads/2022/06/Pop-Air-Black-TG-Clear-Tint_front-1.png',
            'Cooler Master MasterBox Q500L'    => 'https://www.coolermaster.com/media/img/products/Cases/MCB-Q500L-KANN-S00/MCB-Q500L-KANN-S00_gallery_1.jpg',
            'Silverstone SUGO 14'              => 'https://www.silverstonetek.com/uploads/products/SST-SG14B/product_main/SST-SG14B-main.jpg',
            'NZXT H5 Flow'                     => 'https://nzxt.com/assets/cms/34299/1677023858-h5-flow-black-front.png',
            'Lian Li PC-O11 Air'               => 'https://www.lian-li.com/wp-content/uploads/2020/10/O11ABlack_front.jpg',

            // ── COOLER ───────────────────────────────────────────────────────────────
            'Noctua NH-D15'                          => 'https://noctua.at/pub/media/catalog/product/nh/d/nh-d15.jpg',
            'be quiet! Dark Rock Pro 4'              => 'https://www.bequiet.com/include/gd/resizeImage.php?image=/800/productImages/183/be_quiet_DARK_ROCK_PRO_4_MAIN.jpg&width=600&height=600',
            'Cooler Master Hyper 212 Black'          => 'https://www.coolermaster.com/media/img/products/CPU-Coolers/RR-212S-20PK-R2/RR-212S-20PK-R2_gallery_1.jpg',
            'Noctua NH-U12S Redux'                   => 'https://noctua.at/pub/media/catalog/product/nh/u/nh-u12s-redux.jpg',
            'Thermalright Peerless Assassin 120 SE'  => 'https://thermalright.com/wp-content/uploads/2022/08/Peerless-Assassin-120-SE-1.jpg',
            'DeepCool AK620'                         => 'https://www.deepcool.com/upload/2021/10/12/20211012175312-1-b9a48a2b-eb0b-4f2a-9f50-73a748e2b1ed.png',
            'NZXT Kraken X53 240mm AIO'              => 'https://nzxt.com/assets/cms/34299/1631220210-kraken-x53-product-image-black-front.png',
            'Corsair H100x Elite 240mm AIO'          => 'https://www.corsair.com/medias/sys_master/images/images/hb3/h91/9919869714462/CW-9060065-WW-Gallery-H100x-ELITE-01.png',
            'be quiet! Pure Loop 2 FX 240mm'         => 'https://www.bequiet.com/include/gd/resizeImage.php?image=/800/productImages/532/bequiet_PURE_LOOP_2_FX_MAIN.jpg&width=600&height=600',
            'NZXT Kraken X73 360mm AIO'              => 'https://nzxt.com/assets/cms/34299/1631220210-kraken-x73-product-image-black-front.png',
            'Arctic Liquid Freezer III 360'           => 'https://cdn.arctic.de/products/ACFRE00136A/ACFRE00136A-front.jpg',
            'Scythe Fuma 3'                           => 'https://www.scythe-eu.com/fileadmin/media/images/products/SCFM-3000/SCFM-3000-main.jpg',
            'Cooler Master MasterLiquid 360L Core'   => 'https://www.coolermaster.com/media/img/products/CPU-Coolers/MLW-D36M-A18PZ-R1/MLW-D36M-A18PZ-R1_gallery_1.jpg',
            'be quiet! Shadow Rock 3'                => 'https://www.bequiet.com/include/gd/resizeImage.php?image=/800/productImages/233/be_quiet_SHADOW_ROCK_3_MAIN.jpg&width=600&height=600',
            'Noctua NH-L9a-AM5 (Low Profile)'        => 'https://noctua.at/pub/media/catalog/product/nh/l/nh-l9a-am5-r1.jpg',
        ];

        foreach ($images as $name => $url) {
            DB::table('components')->where('name', $name)->update(['image_url' => $url]);
        }
    }

    public function down(): void {}
};
