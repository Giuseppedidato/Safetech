<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasProfilePhoto, Notifiable, TwoFactorAuthenticatable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'company_id', // Relazione con l'azienda
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relazione con dispositivi (un utente può avere più dispositivi)
    public function devices()
    {
        return $this->hasMany(UserDevice::class);
    }

    // Relazione con azienda (un utente appartiene a una azienda)
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // Relazione con abbonamenti
    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class, 'user_subscriptions');
    }

    public function isAdmin(): bool
    {
        return $this->hasRole('admin');
    }

    public function isCompanyAdmin(): bool
    {
        return $this->hasRole('company-admin');
    }

    public function isEmployee(): bool
    {
        return $this->hasRole('employee');
    }
}
