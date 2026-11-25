<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Etudiant extends Model
{
    protected $fillable = [
        'user_id',
        'matricule',
        'filiere',
        'niveau',
        'annee_scolaire',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
