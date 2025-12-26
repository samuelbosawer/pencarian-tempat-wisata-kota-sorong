<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
   

        $user = User::create([
            'nama' => 'Admin',
            // 'alamat' => 'Sentani',
            // 'no_hp' => '082198159714',
            'email' => 'admin@master.com',
            'password' =>  bcrypt('admin@master.com'),
            // 'jenis_kelamin' => '',

        ]);
        $user->assignRole('admin');



        $user = User::create([
            'nama' => 'Bos Tours & Travel',
            // 'alamat' => 'Sentani',
            // 'no_hp' => '082198159711',
            'email' => 'bos@gmail.com',
            'password' =>  bcrypt('bos@gmail.com'),
            // 'jenis_kelamin' => '',

        ]);
        $user->assignRole('usaha');

          $user = User::create([
            'nama' => 'Jhon',
            // 'alamat' => 'Sentani',
            // 'no_hp' => '082198159712',
            'email' => 'jhon@gmail.com',
            'password' =>  bcrypt('jhon@gmail.com'),
            // 'jenis_kelamin' => '',

        ]);
        $user->assignRole('pengunjung');

        
    }
}
