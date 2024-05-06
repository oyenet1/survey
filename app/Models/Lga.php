<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lga extends Model
{
    use HasFactory;

    function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }
}
