<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'nisn' => $this->faker->unique->numerify('2020####'), //generate random $ digit
            'nis' => $this->faker->numerify('2020####'),
            'nama' => $this->faker->unique()->firstName() . ' ' . $this->faker->unique()->lastName(),
            'id_kelas' => mt_rand(1, 5),
            'alamat' => $this->faker->streetAddress(),
            'no_telp' => $this->faker->unique->numerify('+62###########'),
            'id_spp' => mt_rand(1, 5),
            'keterangan' => 'belum lunas'
        ];
    }
}
