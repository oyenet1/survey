<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Survey extends Model
{
    use HasFactory;

    function lga(): BelongsTo
    {
        return $this->belongsTo(Lga::class);
    }

    function enumerator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function booted()
    {
        parent::booted();
        self::created(function ($survey) {
            $survey->update(['lga_id' => $survey->enumerator->lga_id]);
        });
    }
}
