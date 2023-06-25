<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Company;
use App\Models\Hardware;
use App\Models\Periphel;
use App\Models\Provaider;
use App\Models\Software;
use App\Policies\ActivityPolicy;
use App\Policies\CompanyPolicyMain;
use App\Policies\HardwarePolicy;
use App\Policies\PeriphelPolicy;
use App\Policies\ProvaiderPolicy;
use App\Policies\SoftwarePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Spatie\Activitylog\Models\Activity;

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
        Activity::class => ActivityPolicy::class

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
