<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employer;
use Illuminate\Support\Str;
use App\Models\Experience;
use App\Models\EmployerDescription;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fakeJob = fake()->jobTitle();
        return [
            'employer_id' => Employer::factory()->has(EmployerDescription::factory(),'description'),
            'title' => $fakeJob,
            'title_slug' => Str::slug($fakeJob),
            'salary' => fake()->randomFloat(2,10000,90000),
            'location' => fake()->randomElement(['Remote','Office']),
            'schedule' => fake()->randomElement(['Full Time','Part Time']),
            'experience_id' => Experience::inRandomOrder()->first()->id,
            'education' => fake()->randomElement(['Superioare','Medii-de-specialitate','Medii','Student']),
            'description' => fake()->paragraphs(3,true),
            'city_id' => ($cityId = fake()->numberBetween(1,44)),
            'address_id' => fake()->numberBetween(1,1490),
            'sector_id' => $cityId === 11 ? fake()->numberBetween(1,17) : null,
            'url' => fake()->url(),
            'feature' => fake()->randomElement([false,true]),
        ];
    }
}
