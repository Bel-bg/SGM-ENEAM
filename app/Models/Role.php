<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    protected $fillable = ['nom', 'description'];

    public function users(): BelongstoMany
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
