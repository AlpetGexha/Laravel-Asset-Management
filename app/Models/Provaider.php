<?php

namespace App\Models;

use App\Traits\HasComapanyId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Provaider extends Model
{
    use HasFactory,
        HasComapanyId;

    protected $fillable = [
        'name', 'company_id',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
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
}
