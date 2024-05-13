<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    use HasFactory;

    function lgas(): HasMany
    {
        return $this->hasMany(Lga::class);
    }


    function surveys(): HasMany
    {
        return $this->hasMany(Survey::class);
    }
}
