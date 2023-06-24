<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CompanyScopeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();

        // Check if the user has the "super_admin" role
        // dd(auth()->user());
        if ($user->hasRole('super_admin')) {
            return $next($request);
        }
        // Get the authenticated user's current company ID
        $currentCompanyId = auth()->user()->currentCompany->id;

        // Get the models that have a 'company_id' column in their $fillable array
        $fillableModels = $this->getModels();

        foreach ($fillableModels as $model) {
            // Apply the company ID filter to the query builder
            $model::addGlobalScope('company', function (Builder $builder) use ($currentCompanyId) {
                $builder->where('company_id', $currentCompanyId);
            });
        }

        return $next($request);
    }

    /**
     * Get the models that have a 'company_id' column in their $fillable array.
     *
     * @return array
     */
    protected function getModels()
    {
        $models = [
            \App\Models\Asset::class,  // Add more models here
        ];

        $fillableModels = [];

        foreach ($models as $model) {
            $instance = new $model;

            if (in_array('company_id', $instance->getFillable())) {
                $fillableModels[] = $model;
            }
        }

        return $fillableModels;
    }
}
