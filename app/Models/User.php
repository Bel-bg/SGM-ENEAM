<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;

//#[Fillable(['name', 'email', 'password'])]
//#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $fillable = [
    'name',
    'prenom',
    'email',
    'matricule',
    'email_verified_at',
    'password',
    'otp_code',
    'otp_expires_at',
    'invitation_token',
    ];

    protected $hidden = [
    'password',
    'remember_token',
    'otp_code',
    'invitation_token',
    ];

    protected function casts(): array
    {
    return [
        'email_verified_at' => 'datetime',
        'otp_expires_at'    => 'datetime',
        'password'          => 'hashed',
    ];
    }


    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    // verifier un role précis : $user->hasRole('admin')
    public function hasRole(string $role): bool
    {
        return $this->roles->contains('nom', $role);
    }

    // verifier si l'utilisateur posède au moins un de roles passés 
    public function hasAnyRole(array $roles): bool
    {
        return $this->roles->whereIn('nom', $roles)->isNotEmpty();
    }
    
    public function etudiant(): HasOne
    {
        return $this->hasOne(Etudiant::class);
    }
}
