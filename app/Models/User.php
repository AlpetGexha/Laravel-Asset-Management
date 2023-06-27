<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Wallo\FilamentCompanies\HasCompanies;
use Wallo\FilamentCompanies\HasProfilePhoto;

class User extends Authenticatable implements FilamentUser, HasAvatar
{
    use HasApiTokens,
        HasFactory,
        HasProfilePhoto,
        HasCompanies,
        Notifiable,
        HasRoles,
        TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function canAccessFilament(): bool
    {
        return true;
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->profile_photo_url;
    }

    public function hardware(): HasMany
    {
        return $this->hasMany(Hardware::class);
    }

    

    public function hasSelectCompanyPermission(string $permission)
    {
        $company = $this->currentCompany();

        $this->hasCompanyPermission($company, $permission);
    }

    public function hasComapanyModel(Model $model): bool
    {
        return $this->current_company_id === $model->company_id;
    }

    public function isSuperAdmin(): bool
    {
        return $this->hasRole('super_admin');
    }

    public function canImpersonate(): bool
    {
        return $this->isSuperAdmin();
    }

    public function canBeImpersonated(): bool
    {
        return ! $this->isSuperAdmin();
    }
}
