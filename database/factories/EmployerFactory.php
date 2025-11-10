<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employer>
 */
class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->company();
        return [
           'name' => $name,
           'name_slug' => Str::slug($name),
           'logo' => 'AOsHqyx7SX3q0s0tAmPrSaD0rkFvZ2on52jw3TTY.png',
           'user_id' => User::factory(),
        ];
    }
}
