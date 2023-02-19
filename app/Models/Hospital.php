<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Hospital extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'city_id'];

    public function doctors(): HasMany
    {
        return $this->hasMany(Doctor::class);
    }

    public function latestDoctor(): HasOne
    {
        return $this->hasOne(Doctor::class)->latestOfMany();
    }

    public function oldestDoctor(): HasOne
    {
        return $this->hasOne(Doctor::class)->oldestOfMany();
    }
}
