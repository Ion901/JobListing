<?php

namespace Database\Seeders;

use App\Models\Sector;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sectors = File::json(base_path('streets.json'))['sectors'];
        

        foreach($sectors as $sector){
            Sector::firstOrCreate([
                'city_id' => $sector['city_id'],
                'name' => $sector['name'],
            ]);
        }
    }
}
