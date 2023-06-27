<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Company;
use App\Models\Hardware;
use App\Models\Periphel;
use App\Models\Provaider;
use App\Models\Software;
use App\Models\User;
use App\Policies\ActivityPolicy;
use App\Policies\CompanyPolicyMain;
use App\Policies\HardwarePolicy;
use App\Policies\PeriphelPolicy;
use App\Policies\ProvaiderPolicy;
use App\Policies\SchedulePolicy;
use App\Policies\SoftwarePolicy;
use App\Policies\UserPolicy;
use HusamTariq\FilamentDatabaseSchedule\Models\Schedule;
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
        Company::class => CompanyPolicyMain::class,
        Hardware::class => HardwarePolicy::class,
        Periphel::class => PeriphelPolicy::class,
        Provaider::class => ProvaiderPolicy::class,
        Software::class => SoftwarePolicy::class,
        Activity::class => ActivityPolicy::class,
        User::class => UserPolicy::class,
        Schedule::class => SchedulePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
