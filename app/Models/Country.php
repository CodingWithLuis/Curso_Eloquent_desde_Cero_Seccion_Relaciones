<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }

    public function hospitals(): HasManyThrough
    {
        return $this->hasManyThrough(Hospital::class, City::class);
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
