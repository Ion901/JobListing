<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Experience extends Model
{
    /** @use HasFactory<\Database\Factories\ExperienceFactory> */
    use HasFactory;
    protected $table = 'experience';

    protected $fillable = ['level'];

    public function job(){
        return $this->hasOne(Job::class);
    }

    public function getLevelAttribute($value): string
    {
        return str_replace('-',' ',$value);
    }
}
