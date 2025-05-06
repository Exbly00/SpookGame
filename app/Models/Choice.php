<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Choice extends Model
{
    // Relation avec le chapitre qui contient la réponse
    public function chapter(): BelongsTo
    {
        return $this->belongsTo(Chapter::class);
    }
}
