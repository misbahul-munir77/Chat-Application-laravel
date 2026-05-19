<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $group = [
            [
                'nama_group' => 'Pemrograman Web 2',
                'gambar' => 'Group.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_group' => 'Pemuda pemudi Cot Girek',
                'gambar' => 'Group.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_group' => 'KOST FATIN',
                'gambar' => 'kost.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_group' => 'SPAR FF',
                'gambar' => 'ngawi.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_group' => 'A2 aneuk agam',
                'gambar' => 'aneuk.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('groups')->insert($group);
    }
}
