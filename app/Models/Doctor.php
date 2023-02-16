<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'hospital_id'];

    public function hospital(): BelongsTo
    {
        return $this->belongsTo(Hospital::class);
    }

    public function specialties(): BelongsToMany
    {
        // return $this->belongsToMany(Specialty::class, 'doctor_specialty', 'doctor_id', 'specialty_id');
        return $this->belongsToMany(Specialty::class);
    }
}
