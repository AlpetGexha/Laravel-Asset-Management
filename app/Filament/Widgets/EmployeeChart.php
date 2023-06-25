<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\Support\Facades\DB;

class EmployeeChart extends BaseWidget
{
    protected static ?int $sort = 1;

    public bool $readyToLoad = false;

    public function loadData(): void
    {
        $this->readyToLoad = true;
    }

    protected function getCards(): array
    {
        if (! $this->readyToLoad) {
            $this->skeletonLoad();
        }

        $employee = DB::table('company_user')
            ->where('company_id', auth()->user()->current_company_id)
            ->count();
        $employee_peeding = DB::table('company_invitations')
            ->where('company_id', auth()->user()->current_company_id)
            ->count();

        return [
            Card::make('Employee', $employee),
            Card::make('Employee Peeding', $employee_peeding),
        ];
    }

    protected function skeletonLoad(): array
    {
        return [
            Card::make('Loading Data', 'loading...'),
        ];
    }
}
