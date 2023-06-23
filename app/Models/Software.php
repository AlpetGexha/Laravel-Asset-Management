<?php

namespace App\Models;

use App\Traits\HasComapanyId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Software extends Model
{
    use HasFactory,
        SoftDeletes,
        HasComapanyId;

    protected $fillable = [
        'company_id', 'name', 'type', 'status', 'current', 'licenses', 'license_period', 'provaider_id', 'purchased_at', 'expired_at',
    ];

    protected $casts = [
        'purchased_at' => 'datetime',
        'expired_at' => 'datetime',
        'current' => 'boolean',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function provaider(): BelongsTo
    {
        return $this->belongsTo(Provaider::class);
    }

    public function software(): HasMany
    {
        return $this->hasMany(Software::class);
    }
}
