<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Misbahul munir',
                'email' => 'misbahul@gmail.com',
                'password' => bcrypt('misbahul123'),
                'gambar' => 'bahul.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Cut Aisyah',
                'email' => 'cut@gmail.com',
                'password' => bcrypt('cut123'),
                'gambar' => 'aisyah.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pak Muhammad Ikhwani, S.Pd.I., M.Sc',
                'email' => 'ikhwan@gmail.com',
                'password' => bcrypt('ikhwan123'),
                'gambar' => 'pakikhwan.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Asha Zulaikha',
                'email' => 'asha@gmail.com',
                'password' => bcrypt('asha123'),
                'gambar' => 'asha.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Tegar Santoso',
                'email' => 'tegar@gmail.com',
                'password' => bcrypt('tegar123'),
                'gambar' => 'tegar.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Fahris Pratama',
                'email' => 'fahris@gmail.com',
                'password' => bcrypt('fahris123'),
                'gambar' => 'paris.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('users')->insert($users);
    }
}
