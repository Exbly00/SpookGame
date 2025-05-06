<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chapter extends Model
{
    // Attributs du chapitre
    protected $fillable = [
        'story_id',
        'title',
        'text',
        'number',
    ];

    // Relation avec l'hitoire qui contient le chapitre
    public function story(): BelongsTo
    {
        return $this->belongsTo(Story::class);
    }

    // Relation avec les choix du chapitre
    public function choices(): HasMany
    {
        return $this->hasMany(Choice::class);
    }
}
