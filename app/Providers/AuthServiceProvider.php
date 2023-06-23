<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Policies\{HardwarePolicy, PeriphelPolicy, ProvaiderPolicy, SoftwarePolicy};
use App\Models\{Company, Hardware, Periphel, Provaider, Software};
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        CompanyPolicyMain::class => Company::class,
        HardwarePolicy::class => Hardware::class,
        PeriphelPolicy::class => Periphel::class,
        ProvaiderPolicy::class => Provaider::class,
        SoftwarePolicy::class => Software::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
