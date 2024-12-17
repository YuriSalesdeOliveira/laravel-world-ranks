<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Country extends Model
{
    use HasFactory;

    protected $casts = [
        'population' => 'float',
        'area' => 'float',
    ];

    public function getPopulationAttribute($value)
    {
        return number_format($value, 2);
    }

    public function getAreaAttribute($value)
    {
        return number_format($value, 2);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
