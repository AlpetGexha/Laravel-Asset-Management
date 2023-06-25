<?php

namespace App\Models;

use App\Traits\HasComapanyId;
use Wallo\FilamentCompanies\Employeeship as FilamentCompaniesEmployeeship;

class Employeeship extends FilamentCompaniesEmployeeship
{
    use HasComapanyId;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;
}
