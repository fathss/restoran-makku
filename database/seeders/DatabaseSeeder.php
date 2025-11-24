<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Reservation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // user
        
        // Akun Admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@resto.com',
            'password' => Hash::make('password'), // Password: password
            'role' => 'admin',
            'phone' => '081234567890',
            'address' => 'Kantor Pusat Resto'
        ]);

        // Akun Employee (Dapur/Kasir)
        User::create([
            'name' => 'Staff Dapur',
            'email' => 'staff@resto.com',
            'password' => Hash::make('password'),
            'role' => 'employee',
            'phone' => '089876543210',
            'address' => 'Mess Karyawan'
        ]);

        // Akun Customer (Pelanggan)
        $customer = User::create([
            'name' => 'Pelanggan Setia',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
            'phone' => '081122334455',
            'address' => 'Jl. Mawar No. 10, Jakarta'
        ]);

        // menu

        $menu1 = Menu::create([
            'menu_name' => 'Nasi Goreng Spesial',
            'description' => 'Nasi goreng dengan bumbu rahasia, dilengkapi telur mata sapi dan sate ayam.',
            'price' => 25000,
            'category' => 'Makanan',
            'available' => true,
            'image_url' => 'img/nasi-goreng.png' // Pastikan file ini ada di public/img
        ]);

        $menu2 = Menu::create([
            'menu_name' => 'Ayam Bakar Madu',
            'description' => 'Ayam kampung bakar dengan olesan madu murni, sambal terasi, dan lalapan.',
            'price' => 30000,
            'category' => 'Makanan',
            'available' => true,
            'image_url' => 'img/ayam-bakar.png'
        ]);

        $menu3 = Menu::create([
            'menu_name' => 'Es Teh Manis Jumbo',
            'description' => 'Teh manis dingin segar ukuran jumbo, cocok untuk menghilangkan dahaga.',
            'price' => 8000,
            'category' => 'Minuman',
            'available' => true,
            'image_url' => 'img/es-teh.png'
        ]);

        $menu4 = Menu::create([
            'menu_name' => 'Sate Lilit Ayam Khas Bali',
            'description' => 'Sate lilit daging ayam cincang dengan bumbu base genep Bali, disajikan dengan sambal matah.',
            'price' => 35000,
            'category' => 'Makanan',
            'available' => true,
            'image_url' => 'img/sate-lilit.png'
        ]);

        $menu5 = Menu::create([
            'menu_name' => 'Rawon Komplit Daging Sapi',
            'description' => 'Sup daging sapi kuah kluwek hitam gurih, disajikan dengan tauge pendek, telur asin, dan sambal.',
            'price' => 38000,
            'category' => 'Makanan',
            'available' => true,
            'image_url' => 'img/rawon.png'
        ]);

        $menu6 = Menu::create([
            'menu_name' => 'Ikan Bakar Sambal Dabu-Dabu',
            'description' => 'Ikan segar dibakar dengan bumbu kuning, disajikan dengan sambal dabu-dabu khas Manado yang segar.',
            'price' => 45000,
            'category' => 'Makanan',
            'available' => true,
            'image_url' => 'img/ikan-bakar.png'
        ]);

        $menu7 = Menu::create([
            'menu_name' => 'Cireng Bumbu Rujak',
            'description' => 'Cireng kriuk disajikan dengan saus rujak pedas manis yang kental.',
            'price' => 18000,
            'category' => 'Snack',
            'available' => true,
            'image_url' => 'img/cireng.png'
        ]);

        $menu8 = Menu::create([
            'menu_name' => 'Lumpia Semarang Rebung',
            'description' => 'Lumpia basah/goreng isi rebung, udang, dan telur. Gurih, disajikan dengan saus cocolan legit.',
            'price' => 22000,
            'category' => 'Snack',
            'available' => true,
            'image_url' => 'img/lumpia.png'
        ]);

        $menu9 = Menu::create([
            'menu_name' => 'Es Campur Spesial',
            'description' => 'Campuran buah-buahan, agar-agar, dan santan segar dengan sirup merah.',
            'price' => 15000,
            'category' => 'Minuman',
            'available' => true,
            'image_url' => 'img/es-campur.png'
        ]);

        $menu10 = Menu::create([
            'menu_name' => 'Kopi Susu Gula Aren Signature',
            'description' => 'Kopi susu dengan takaran gula aren yang pas dan creamy.',
            'price' => 25000,
            'category' => 'Minuman',
            'available' => true,
            'image_url' => 'img/kopi-susu.png'
        ]);

        $menu11 = Menu::create([
            'menu_name' => 'Wedang Jahe Hangat',
            'description' => 'Minuman tradisional dari jahe murni, serai, dan gula merah. Cocok untuk menghangatkan badan.',
            'price' => 12000,
            'category' => 'Minuman',
            'available' => true,
            'image_url' => 'img/wedang-jahe.png'
        ]);

        $menu12 = Menu::create([
            'menu_name' => 'Tahu Isi Pedas',
            'description' => 'Tahu goreng dengan isian sayuran dan cabai rawit ekstra pedas.',
            'price' => 14000,
            'category' => 'Snack',
            'available' => true,
            'image_url' => 'img/tahu-isi.png'
        ]);

        $menu13 = Menu::create([
            'menu_name' => 'Mie Goreng Seafood',
            'description' => 'Mie goreng dengan udang, cumi, dan sayuran segar.',
            'price' => 32000,
            'category' => 'Makanan',
            'available' => true,
            'image_url' => 'img/mie-goreng.png'
        ]);

        $menu14 = Menu::create([
            'menu_name' => 'Test Menu',
            'description' => 'Test Menu Description',
            'price' => 10000,
            'category' => 'Makanan',
            'available' => false,
        ]);
    }
}