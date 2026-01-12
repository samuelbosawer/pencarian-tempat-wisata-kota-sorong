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



        // 3
          $user = User::create([
            'nama' => 'Jhon',
            'email' => 'jhon@gmail.com',
            'password' =>  bcrypt('jhon@gmail.com'),
            'alamat' => 'Jl. Basuki Rahmat No. 40, Remu Selatan',
            'tanggal_lahir' => null, 
            'tempat_lahir' => null

        ]);
        $user->assignRole('pengunjung');




         // 4
          $user = User::create([
            'nama' => 'Agnes Jitmau',
            'email' => 'agnes@gmail.com',
            'password' =>  bcrypt('agnes@gmail.com'),
            'alamat' => 'Jl. Basuki Rahmat No. 40, Remu Selatan',
            'tanggal_lahir' => null, 
            'tempat_lahir' => null

        ]);
        $user->assignRole('pengunjung');



         // 5
          $user = User::create([
            'nama' => 'Jack',
            'email' => 'jack@gmail.com',
            'password' =>  bcrypt('jack@gmail.com'),
            'alamat' => 'Jl. Basuki Rahmat No. 40, Remu Selatan',
            'tanggal_lahir' => null, 
            'tempat_lahir' => null

        ]);
        $user->assignRole('pengunjung');


         // 6
          $user = User::create([
            'nama' => 'Rein',
            'email' => 'rein@gmail.com',
            'password' =>  bcrypt('rein@gmail.com'),
            'alamat' => 'Jl. Basuki Rahmat No. 40, Remu Selatan',
            'tanggal_lahir' => null, 
            'tempat_lahir' => null

        ]);
        $user->assignRole('pengunjung');


         // 7
          $user = User::create([
            'nama' => 'Welem',
            'email' => 'welem@gmail.com',
            'password' =>  bcrypt('welem@gmail.com'),
            'alamat' => 'Jl. Basuki Rahmat No. 40, Remu Selatan',
            'tanggal_lahir' => null, 
            'tempat_lahir' => null

        ]);
        $user->assignRole('pengunjung');


         // 8
          $user = User::create([
            'nama' => 'Yesi',
            'email' => 'yesi@gmail.com',
            'password' =>  bcrypt('yesi@gmail.com'),
            'alamat' => 'Jl. Basuki Rahmat No. 40, Remu Selatan',
            'tanggal_lahir' => null, 
            'tempat_lahir' => null

        ]);
        $user->assignRole('pengunjung');


        
    }
}
