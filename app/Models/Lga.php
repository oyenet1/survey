<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lga extends Model
{
    use HasFactory;
    protected $guarded = [];

    function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }


    function surveys(): HasMany
    {
        return $this->hasMany(Survey::class);
    }
}
