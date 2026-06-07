<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    protected $fillable = ['title', 'title_slug', 'salary', 'location', 'url','experience_id', 'education', 'description', 'schedule', 'feature', 'employer_id','city_id','address_id','sector_id'];

    public function tag(string $name)
    {
        $tag = Tag::firstOrCreate(['name' => $name]);

        $this->tags()->attach($tag);
    }

    public function applicants(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
        ->withPivot('cv_path','status')
        ->withTimestamps();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */

    protected function casts(): array
    {
        return [
            'feature' => 'boolean',
        ];
    }
}
