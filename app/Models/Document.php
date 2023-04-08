<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['filename', 'documentable_id', 'documentable_type'];

    public function documents(): MorphTo
    {
        return $this->morphTo();
    }
}
