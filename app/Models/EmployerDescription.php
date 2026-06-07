<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployerDescription extends Model
{
    use HasFactory;
    protected $table = "employer_description";

    protected $fillable = ['employer_id','description'];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }
}
