<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Story extends Model
{
    // Attributs de la table
    protected $fillable = [
        'title',
        'description',
        'is_visible',
    ];

    // Relation avec le premier chapitre
    public function firstChapter(): HasOne
    {
        return $this->hasOne(Chapter::class)->where('number', 1);
    }

    // Relation avec les chapitres
    public function chapters(): HasMany
    {
        return $this->hasMany(Chapter::class);
    }
}
