<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Provaider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

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
