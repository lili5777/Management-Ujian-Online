<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'username' => 'admin',
                'name' => 'ang',
                'nis' => '111',
                'ayah' => 'al',
                'ibu' => 'il',
                'alamat' => 'hahaha',
                'jekel' => 'l',
                'level' => 'admin',
                'password' => Hash::make('123')
            ],

            [
                'username' => 'siswa',
                'name' => 'angie',
                'nis' => '222',
                'ayah' => 'ali',
                'ibu' => 'ili',
                'alamat' => 'zhahaha',
                'jekel' => 'p',
                'level' => 'siswa',
                'password' => Hash::make('123')
            ],
            [
                'username' => 'guru',
                'name' => 'hasrif',
                'nis' => '333',
                'ayah' => 'alw',
                'ibu' => 'ilw',
                'alamat' => 'shahaha',
                'jekel' => 'l',
                'level' => 'guru',
                'password' => Hash::make('123')
            ],

        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
