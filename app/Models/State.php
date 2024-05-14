<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class State extends Model
{
    use HasFactory;

    protected $guarded = [];


    function lgas(): HasMany
    {
        return $this->hasMany(Lga::class);
    }


    function surveys(): HasMany
    {
        return $this->hasMany(Survey::class);
    }

    public function enumerators(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
