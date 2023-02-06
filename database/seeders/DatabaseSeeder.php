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
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Kelas::factory(5)->create();
        Spp::factory(5)->create();
        Siswa::factory(5)->create();
        Petugas::factory(5)->create();

        foreach (Siswa::all() as $siswa) {
            User::create([
                'name' => $siswa->nama,
                'role' => 'siswa',
                'email' => strtolower(preg_replace('/\W\w+\s*(\W*)$/', '$1', $siswa->nama)) . '@email.com',
                'password' => bcrypt('1234'),
            ]);
        }



        foreach (Petugas::all() as $petugas) {
            User::create([
                'name' => $petugas->nama_petugas,
                'role' => 'petugas',
                'email' => strtolower(preg_replace('/\W\w+\s*(\W*)$/', '$1', $petugas->nama_petugas)) . '@email.com',
                'password' => bcrypt('1234'),
            ]);
        }

        User::create([
            'name' => 'admin',
            'role' => 'admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('1234'),
        ]);
    }
}
