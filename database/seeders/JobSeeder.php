<?php

namespace Database\Seeders;

use App\Models\Employer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Sequence;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tag = Tag::factory(3)->create();

        //sequence in laravel
        Job::factory(10)->hasAttached($tag)->create(new Sequence([
            'feature' => false,
            'schedule' => 'Full-time'
        ],[
            'feature' => true,
            'schedule' => 'Part-time'
        ]));
    }
}
