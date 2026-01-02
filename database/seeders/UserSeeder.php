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
            'email' => 'admin@master.com',
            'password' =>  bcrypt('admin@master.com'),

            'alamat' => 'Jenderal Sudirman No. 5, Kota Sorong',
            'tanggal_lahir' => null, 
            'tempat_lahir' => null

       

        ]);
        $user->assignRole('admin');



        $user = User::create([
            'nama' => 'Bos Tours & Travel',
            'email' => 'bos@gmail.com',
            'password' =>  bcrypt('bos@gmail.com'),

            'alamat' => 'Pelabuhan Soron',
            'tanggal_lahir' => null, 
            'tempat_lahir' => null
        ]);
        $user->assignRole('usaha');

          $user = User::create([
            'nama' => 'Jhon',
            'email' => 'jhon@gmail.com',
            'password' =>  bcrypt('jhon@gmail.com'),
            'alamat' => 'Jl. Basuki Rahmat No. 40, Remu Selatan',
            'tanggal_lahir' => null, 
            'tempat_lahir' => null

        ]);
        $user->assignRole('pengunjung');

        
    }
}
