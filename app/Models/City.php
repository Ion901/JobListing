<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class City extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $table = 'cities';

    public function sectors()
    {
        return $this->hasMany(Sector::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

}
