<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::insert([
            [
                'name' => 'Gudeg',
                'desc' => 'Cita rasa yang manis khas Jogjakarta ditemani dengan telur bulat yang lezat',
                'price' => 20000,
                'path_img' => 'https://i.ytimg.com/vi/ApLNIWYZXdw/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLBITxu_xAq9Ir3ELzyOAvBYnGReeA',
                'category' => 'food',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Krecek',
                'desc' => 'Rasa gurih dan pedas yang pas dengan kacang tanah yang lezat',
                'price' => 20000,
                'path_img' => 'https://cdn.idntimes.com/content-images/community/2022/01/fromandroid-08975632ee1e04c414e81a6d6eaabd0e_600x400.jpg',
                'category' => 'food',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Mie Ayam Pangsit',
                'desc' => 'Mie kenyal dengan kuah gurih ditabur irisan daging ayam yang manis dan kerupuk pangsit yang renyah',
                'price' => 18000,
                'path_img' => 'https://img.kurio.network/7bsEoIvH2TguQxaJD74H4Rg_mgQ=/1200x900/filters:quality(80)/https://kurio-img.kurioapps.com/22/01/20/3ec9948f-7c30-4613-ad0c-36bf6fd7f3fb.jpe',
                'category' => 'food',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Bakso Sapi',
                'desc' => 'Olahan daging sapi yang lezat dengan tetelan dan bihun/mie sebagai pelengkap. Tersedia berbagai pilihan Bakso Urat/Telor/Beranak',
                'price' => 21000,
                'path_img' => 'https://cdn0-production-images-kly.akamaized.net/VTDiAj5ffuLCm1CEjR9VExObwkQ=/1200x675/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/2763419/original/071857300_1553761217-shutterstock_1148354906.jpg',
                'category' => 'food',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Rendang',
                'desc' => 'Daging sapi dengan bumbu khas Minangkabau yang lezat, empuk, dan pedas',
                'price' => 14000,
                'path_img' => 'https://cdn.idntimes.com/content-images/community/2022/04/resep-rendang-filosofi-rendang-makna-rendang-arti-rendang-rendang-dari-mana-makanan-indonesia-filosofi-9cde86371d7fc78c91ae80a6ffab250e-e0b9344da253b8e653bd42c7df03d6d9.jpg',
                'category' => 'food',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Ikan Gurame 1 ekor',
                'desc' => 'Ikan air tawar yang fresh disajikan dengan berbagai pilihan Asam manis, Bakar, Goreng, Gulai, dan Kuah Asam',
                'price' => 98000,
                'path_img' => 'https://img-global.cpcdn.com/recipes/d119fcca847db9dd/680x482cq70/ikan-gurame-saus-asam-manis-foto-resep-utama.jpg',
                'category' => 'food',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Ayam Kampung 1 ekor',
                'desc' => 'Ayam kampung yang lezat dan lembut disajikan berbagai pilihan Goreng, Bakar, Gulai, dan Opor. Bisa request dipotong-potong/utuh',
                'price' => 86000,
                'path_img' => 'https://bdsgp.my.id/img/800/bw5d48ohbw5hulmnkp_3/hE6s7Xe0h8OYaf8bhE6tba26x7iyBzoRpuhli3HltL6w.jpg',
                'category' => 'food',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Cah Kangkung',
                'desc' => 'Rasa gurih dengan irisan cabai diatasnya yang menambah cita rasanya',
                'price' => 15000,
                'path_img' => 'https://yoona.id/wp-content/uploads/2022/09/Kalori-Kangkung-Tumis-1.jpg',
                'category' => 'food',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Sop Ayam',
                'desc' => 'Sop ayam disajikan dengan rasa gurih dan nikmat yang menghangatkan badan',
                'price' => 20000,
                'path_img' => 'https://cdn0-production-images-kly.akamaized.net/MouBt1YOGKwMswF3AxoJ_6y0nAo=/1200x675/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/2487079/original/074694900_1543332819-resep-cara-membuat-sop-sayap-ayam-gurih-bikin-nagih.jpg',
                'category' => 'food',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Sop Kambing',
                'desc' => 'Sop kambing disajikan dengan rasa gurih dan nikmat yang menghangatkan badan',
                'price' => 22000,
                'path_img' => 'https://www.masakapahariini.com/wp-content/uploads/2023/06/Sop-kambing.jpeg',
                'category' => 'food',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Teh (Tawar/Manis)',
                'desc' => 'Teh tawar atau manis yang menyegarkan tubuh, bisa disajikan dingin',
                'price' => 5000,
                'path_img' => 'https://cdn.antaranews.com/cache/1200x800/2018/11/Menyeduh-teh-untuk-rasa-yang-nikmat.jpg',
                'category' => 'drink',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Perasan Jeruk (Panas/Dingin)',
                'desc' => 'Minuman perasan jeruk yang segar dan manis, bisa request pakai gula atau tidak',
                'price' => 12000,
                'path_img' => 'https://cdn0-production-images-kly.akamaized.net/R64K0ng6S4FS6oH6y263peazCeM=/17x0:926x512/500x281/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/2247300/original/097384400_1528762027-Es_jeruk-pinteest.jpg',
                'category' => 'drink',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Jus Sirsak',
                'desc' => 'Buah sirsak pilihan disajikan dengan cara di jus agar segar dan lezat',
                'price' => 12000,
                'path_img' => 'https://img-global.cpcdn.com/recipes/6ebf652e3836779f/680x482cq70/jus-sirsak-kental-dan-enak-foto-resep-utama.jpg',
                'category' => 'drink',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Jus Mangga',
                'desc' => 'Buah mangga pilihan disajikan dengan cara di jus agar segar dan lezat',
                'price' => 12000,
                'path_img' => 'https://api.omela.com/storage/content-editor-images/s19HG8PSp4ItqT6d1Wbjw5dDxZR5H1jvcbb5CYH0.jpg',
                'category' => 'drink',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Sop Buah',
                'desc' => 'Buah-buahan seperti anggur, buah naga, leci, apel, melon, alpukat, pear, stoberi, dan mangga yang disajikan dalam 1 wadah dengan es batu, susu, dan sirup agar lebih segar dan lezat',
                'price' => 25000,
                'path_img' => 'https://cdn0-production-images-kly.akamaized.net/Q3txRSUSDcd-IIRurG30SLK49TY=/198x0:865x667/1200x1200/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/4771907/original/076925900_1710390673-shutterstock_2278451269.jpg',
                'category' => 'drink',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
