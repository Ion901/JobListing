<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['sector_id', 'street'];

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
}
