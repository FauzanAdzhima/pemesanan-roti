<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Customer;
use App\Models\Cashier;
use App\Models\Administrator;

use App\Models\Menu;
use App\Models\Category;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $password = Hash::make('password');

        User::truncate();
        Cashier::truncate();
        Administrator::truncate();
        Menu::truncate();
        Category::truncate();

        User::create([
            'name' => 'Joko',
            'email' => 'sayaadmin@gmail.com',
            'role' => 'admin',
            'password' => $password
        ]);
        Administrator::create([
            'nama' => 'Joko',
            'nohp' => '081277593123',
            'email' => 'sayaadmin@gmail.com',
            'password' => $password
        ]);


        User::create([
            'name' => 'Fauzan',
            'email' => 'sayakasir@gmail.com',
            'role' => 'kasir',
            'password' => $password,
        ]);
        Cashier::create([
            'nama' => 'Fauzan',
            'nik' => '123123123123',
            'email' => 'sayakasir@gmail.com',
            'password' => $password,
            'status' => 'Aktif'
        ]);

        
        User::create([
            'name' => 'Adzhima',
            'email' => 'sayapelanggan@gmail.com',
            'role' => 'pelanggan',
            'password' => $password,
        ]);
        Customer::create([
            'nama' => 'Adzhima',
            'alamat' => '',
            'kontak' => '081234567890',
            'email' => 'sayapelanggan@gmail.com',
            'password' => $password,
            'total_transaksi' => 0
        ]);


        Category::create([
            'nama' => 'Roti'
        ]);
        Category::create([
            'nama' => 'Cake'
        ]);
        Category::create([
            'nama' => 'Makanan'
        ]);
        Category::create([
            'nama' => 'Minuman'
        ]);

        Menu::create([
            'id' => '1',
            'nama' => 'Nasi Goreng Biasa',
            'category_id' => '3',
            'harga' => 10000,
            'status' => 'Tersedia',
            'deskripsi' => 'Ini deskripsi menu',
            'terjual' => 100,
            'image' => 'menu-images/default-food.jpg'
            
        ]);
        Menu::create([
            'id' => '2',
            'nama' => 'Nasi Goreng Pataya',
            'category_id' => '3',
            'harga' => 15000,
            'status' => 'Tersedia',
            'deskripsi' => 'Ini deskripsi menu',
            'terjual' => 50,
            'image' => 'menu-images/default-food.jpg'
        ]);
        Menu::create([
            'id' => '3',
            'nama' => 'Kacang Rebus',
            'category_id' => '3',
            'harga' => 10000,
            'status' => 'Tersedia',
            'deskripsi' => 'Ini deskripsi menu',
            'terjual' => 20,
            'image' => 'menu-images/default-food.jpg'
        ]);
        Menu::create([
            'id' => '4',
            'nama' => 'Donat',
            'category_id' => '1',
            'harga' => 3000,
            'status' => 'Tersedia',
            'deskripsi' => 'Ini deskripsi menu',
            'terjual' => 10,
            'image' => 'menu-images/default-food.jpg'
        ]);
        Menu::create([
            'id' => '5',
            'nama' => 'Roti Kacang Merah',
            'category_id' => '1',
            'harga' => 3000,
            'status' => 'Tersedia',
            'deskripsi' => 'Ini deskripsi menu',
            'terjual' => 5,
            'image' => 'menu-images/default-food.jpg'
        ]);
        Menu::create([
            'id' => '6',
            'nama' => 'Cake Pisang',
            'category_id' => '2',
            'harga' => 5000,
            'status' => 'Tersedia',
            'deskripsi' => 'Ini deskripsi menu',
            'terjual' => 1,
            'image' => 'menu-images/default-food.jpg'
        ]);        
      }
}
