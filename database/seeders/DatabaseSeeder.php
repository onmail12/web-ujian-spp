<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelas;
use App\Models\Spp;
use App\Models\Siswa;
use App\Models\Petugas;
use App\Models\User;

use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        Kelas::factory(5)->create();
        Spp::factory(5)->create();
        Siswa::factory(5)->create();
        Petugas::factory(5)->create();

        Petugas::create([
            'nama_petugas' => 'admin'
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('1234'),
            'id_petugas' => Petugas::where('nama_petugas', 'admin')->first()->id_petugas,
            'role' => 'admin',
        ]);
        
        User::create([
            'name' => 'admin_1',
            'email' => 'admin1@email.com',
            'password' => bcrypt('1234'),
            'id_petugas' => Petugas::where('nama_petugas', 'admin')->first()->id_petugas,
            'role' => 'admin',
        ]);

        foreach (Siswa::all() as $siswa) {
            User::create([
                'name' => $siswa->nama,
                'email' => strtolower(strtok($siswa->nama, ' ')) . $faker->numerify('##') . '@email.com',
                // 'email' => fake()->unique()->safeEmail(),
                'password' => bcrypt('1234'),
                'nisn' => $siswa->nisn,
                'role' => 'siswa',
            ]);
        }

        foreach (Petugas::all() as $petugas) {
            User::create([
                'name' => $petugas->nama_petugas,
                'email' => strtolower(strtok($petugas->nama_petugas, ' ')) . $faker->numerify('##') . '@email.com',
                // 'email' => fake()->unique()->safeEmail(),
                'password' => bcrypt('1234'),
                'id_petugas' => $petugas->id_petugas,
                'role' => 'petugas',
            ]);
        }
    }
}
