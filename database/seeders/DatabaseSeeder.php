<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $user =
        [
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $kriteria = 
        [
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Putih",
                "Bau"=> "Normal",
                "Butir"=> "Pecah",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Rusak",
                "Hama"=> "Bebas",
                "Mutu"=> "Buruk"
            ],
            [
                "Warna"=> "Campur",
                "Bau"=> "Busuk",
                "Butir"=> "Rusak",
                "Hama"=> "Terkena",
                "Mutu"=> "Buruk"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Campur",
                "Bau"=> "Normal",
                "Butir"=> "Pecah",
                "Hama"=> "Bebas",
                "Mutu"=> "Buruk"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Rusak",
                "Hama"=> "Terkena",
                "Mutu"=> "Buruk"
            ],
            [
                "Warna"=> "Putih",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Putih",
                "Bau"=> "Busuk",
                "Butir"=> "Rusak",
                "Hama"=> "Bebas",
                "Mutu"=> "Buruk"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Campur",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Campur",
                "Bau"=> "Busuk",
                "Butir"=> "Pecah",
                "Hama"=> "Terkena",
                "Mutu"=> "Buruk"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Busuk",
                "Butir"=> "Rusak",
                "Hama"=> "Bebas",
                "Mutu"=> "Buruk"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Pecah",
                "Hama"=> "Terkena",
                "Mutu"=> "Buruk"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Campur",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Putih",
                "Bau"=> "Busuk",
                "Butir"=> "Pecah",
                "Hama"=> "Bebas",
                "Mutu"=> "Buruk"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Campur",
                "Bau"=> "Busuk",
                "Butir"=> "Baik",
                "Hama"=> "Terkena",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Buruk"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Campur",
                "Bau"=> "Busuk",
                "Butir"=> "Rusak",
                "Hama"=> "Bebas",
                "Mutu"=> "Buruk"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Putih",
                "Bau"=> "Normal",
                "Butir"=> "Pecah",
                "Hama"=> "Bebas",
                "Mutu"=> "Buruk"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Terkena",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Putih",
                "Bau"=> "Busuk",
                "Butir"=> "Baik",
                "Hama"=> "Terkena",
                "Mutu"=> "Buruk"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Campur",
                "Bau"=> "Busuk",
                "Butir"=> "Rusak",
                "Hama"=> "Terkena",
                "Mutu"=> "Buruk"
            ],
            [
                "Warna"=> "Putih",
                "Bau"=> "Busuk",
                "Butir"=> "Rusak",
                "Hama"=> "Terkena",
                "Mutu"=> "Buruk"
            ],
            [
                "Warna"=> "Putih",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Campur",
                "Bau"=> "Normal",
                "Butir"=> "Pecah",
                "Hama"=> "Bebas",
                "Mutu"=> "Buruk"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Terkena",
                "Mutu"=> "Buruk"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Putih",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Terkena",
                "Mutu"=> "Buruk"
            ],
            [
                "Warna"=> "Campur",
                "Bau"=> "Normal",
                "Butir"=> "Pecah",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Busuk",
                "Butir"=> "Rusak",
                "Hama"=> "Terkena",
                "Mutu"=> "Buruk"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Baik",
                "Hama"=> "Bebas",
                "Mutu"=> "Berkualitas"
            ],
            [
                "Warna"=> "Kuning",
                "Bau"=> "Normal",
                "Butir"=> "Pecah",
                "Hama"=> "Terkena",
                "Mutu"=> "Buruk"
            ],
            [
                "Warna"=> "Campur",
                "Bau"=> "Busuk",
                "Butir"=> "Rusak",
                "Hama"=> "Terkena",
                "Mutu"=> "Buruk"
            ]
        ];

        DB::table('users')->insert($user);  
        DB::table('kriterias')->insert($kriteria);  
    
    }
}
