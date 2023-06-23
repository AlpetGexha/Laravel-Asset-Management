<?php

namespace App\Models;

use App\Traits\HasComapanyId;
use App\Traits\HasUserId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Periphel extends Model
{
    use HasFactory,
        SoftDeletes,
        HasUserId,
        HasComapanyId;

    protected $fillable = [
        'make', 'model', 'serial', 'company_id', 'type', 'status',  'user_id', 'provaider_id', 'purchased_at',
    ];

    protected $casts = [
        'purchased_at' => 'datetime',
        'current' => 'boolean',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function provaider(): BelongsTo
    {
        return $this->belongsTo(Provaider::class);
    }
}
