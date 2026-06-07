<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\EmployerPhoto;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employer extends Model
{
    /** @use HasFactory<\Database\Factories\EmployerFactory> */
    use HasFactory;

    protected $fillable = ['company_name', 'logo', 'company_slug', 'user_id', 'phone', 'contact_person', 'email'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->hasMany(Job::class);
    }

    public function description(): HasOne
    {
        return $this->hasOne(EmployerDescription::class);
    }

    public function photos(): HasMany
    {
        return $this->hasMany(EmployerPhoto::class);
    }

    public function getUserNameAttribute(): string
    {
        return $this->user->name;
    }
}
