<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kelas>
 */
class KelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_kelas' => $this->faker->randomElement(['X', 'XI', 'XII']) . ' ' . $this->faker->randomElement(['RPL', 'TKJ', 'MM', 'TITL', 'TP', 'TSM']) . ' ' . random_int(1, 3),
            'kompetensi_keahlian' => $this->faker->randomElement(['Komputer', 'Teknik'])
        ];
    }
}
