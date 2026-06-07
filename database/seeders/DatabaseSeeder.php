<?php

namespace Database\Seeders;

use App\Models\EmployerDescription;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Experience;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(1)->create();

        $experiences = ['Posibil-fără-experiență', 'Cu-experiență', 'Pînă-la-1-an', 'De-la-1-an', 'De-la-2-ani', 'De-la-3-ani', 'De-la-4-ani', 'Peste-5-ani'];

        foreach ($experiences as $exp) {
            Experience::firstOrCreate(['level' => $exp]);
        }

        $this->call([
            CitiesSeeder::class,
            SectorSeeder::class,
            AddressesSeeder::class,
            JobSeeder::class
            ]);
    }
}
