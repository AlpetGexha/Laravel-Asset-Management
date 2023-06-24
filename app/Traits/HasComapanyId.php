<?php

namespace App\Traits;

use App\Models\Scopes\CompanyScope;
use Illuminate\Database\Eloquent\Model;

trait HasComapanyId
{
    protected static function bootHasComapanyId()
    {
        static::creating(function (Model $model) {
            if (auth()->check()) {
                $model->company_id = auth()->user()->currentCompany->id;
            }
        });

        if (auth()->check())
            static::addGlobalScope(new CompanyScope);
    }
}