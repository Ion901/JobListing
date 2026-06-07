<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class AddressesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = File::json(base_path('streets.json'))['streets'];
        $streets = $data[0];

        foreach ($streets as $name => $street) {
            Address::firstOrCreate(
                ['street' => $street['name']],
                ['city_id' => $street['sector_id'] ?? null]
            );
        }
    }
}