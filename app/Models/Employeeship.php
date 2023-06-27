<?php

namespace App\Models;

use App\Traits\HasComapanyId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Wallo\FilamentCompanies\Employeeship as FilamentCompaniesEmployeeship;

class Employeeship extends FilamentCompaniesEmployeeship
{
    use HasComapanyId, HasFactory;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    protected $guard = [];

    protected $table = 'company_user';

    protected $fillable = [
        'company_id',
        'user_id',
        'role',
    ];

    protected $casts = [
        'company_id' => 'integer',
        'user_id' => 'integer',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
