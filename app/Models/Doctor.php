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
        return $this->belongsToMany(Specialty::class)
            ->as('doctor_specialty')
            /*  ->using(DoctorSpecialty::class) */
            ->withTimestamps()
            ->withPivot(['is_specialty_abroad']);
    }

    public function specialtiesAbroad(): BelongsToMany
    {
        // return $this->belongsToMany(Specialty::class, 'doctor_specialty', 'doctor_id', 'specialty_id');
        return $this->belongsToMany(Specialty::class)
            ->as('doctor_specialty')
            ->withTimestamps()
            ->withPivot(['is_specialty_abroad'])
            ->wherePivot('is_specialty_abroad', 1)
            ->orderByPivot('created_at', 'desc');
    }
}
