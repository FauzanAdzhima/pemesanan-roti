<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
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
      }
}
