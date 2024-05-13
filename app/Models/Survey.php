<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Survey extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'services' => 'array',
        'lenders' => 'array',
        'payment_methods' => 'array',
        'fintechs' => 'array',
    ];

    function lga(): BelongsTo
    {
        return $this->belongsTo(Lga::class);
    }
    function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    function enumerator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function booted()
    {
        parent::booted();
        self::creating(function ($survey) {
            // $survey->update(['lga_id' => $survey->enumerator->lga_id]);
            if (auth()->check()) {
                $survey->user_id = auth()->id();
            }
        });
    }
}
