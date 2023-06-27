<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Wallo\FilamentCompanies\Company as FilamentCompaniesCompany;
use Wallo\FilamentCompanies\Events\CompanyCreated;
use Wallo\FilamentCompanies\Events\CompanyDeleted;
use Wallo\FilamentCompanies\Events\CompanyUpdated;

class Company extends FilamentCompaniesCompany
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'personal_company' => 'boolean',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'personal_company',
    ];

    /**
     * The event map for the model.
     *
     * @var array<string, class-string>
     */
    protected $dispatchesEvents = [
        'created' => CompanyCreated::class,
        'updated' => CompanyUpdated::class,
        'deleted' => CompanyDeleted::class,
    ];

    // boot user_id while creating
    protected static function booted()
    {
        static::creating(function ($company) {
            if (auth()->check()) {
                $company->user_id = auth()->user()->id;
            }
        });
    }

    public function hardware(): HasMany
    {
        return $this->hasMany(Hardware::class);
    }

    public function software(): HasMany
    {
        return $this->hasMany(Software::class);
    }

    public function periphels(): HasMany
    {
        return $this->hasMany(Periphel::class);
    }

    public function provaider(): HasMany
    {
        return $this->hasMany(Provaider::class);
    }

    public function employeeships(): HasMany
    {
        return $this->hasMany(Employeeship::class);
    }
}
