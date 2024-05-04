<?php

namespace Database\Factories;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Karyawan>
 */
class KaryawanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Karyawan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Get random user id
        $userId = User::inRandomOrder()->first()->id;

        return [
            'nama_lengkap' => $this->faker->name,
            'nomor_induk_karyawan' => $this->faker->unique()->randomNumber(5),
            'alamat' => $this->faker->address,
            'cabang' => $this->faker->randomElement(['Bandung', 'Garut', 'Sukabumi', 'Cianjur']),
            'organisasi' => $this->faker->randomElement(['Operasional', 'Supporting']),
            'jabatan' => $this->faker->randomElement(['Staff IT', 'Spv IT', 'Manager IT', 'Direktur Umum']),
            'level_jabatan' => $this->faker->randomElement(['Staff', 'Spv', 'Manager', 'Direktur']),
            'id_user' => $userId,
        ];
    }
}
