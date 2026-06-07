<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\Address;

class Sector extends Model
{
    use HasFactory;

    protected $fillable = ['city_id','name'];
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
