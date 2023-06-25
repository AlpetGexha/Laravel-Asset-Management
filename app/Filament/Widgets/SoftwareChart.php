<?php

namespace App\Filament\Widgets;

use App\Actions\Trend;
use App\Models\Software;
use Filament\Widgets\LineChartWidget;
use Flowframe\Trend\TrendValue;

class SoftwareChart extends LineChartWidget
{
    protected static ?string $heading = 'Software';

    protected static ?int $sort = 5;

    public ?string $filter = 'this_month';

    public bool $readyToLoad = false;

    public function loadData(): void
    {
        $this->readyToLoad = true;
    }

    protected function getData(): array
    {
        if (! $this->readyToLoad) {
            $this->getSkeletonLoad();
        }

        $activeFilter = $this->filter;

        $data = Trend::model(Software::class)
            ->filterBy($activeFilter)
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Hardware Publish',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => 'rgba(255, 205, 86, 0.2)',
                    'borderColor' => 'rgb(255, 205, 86)',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getFilters(): ?array
    {
        return Trend::filterType();
    }

    private function getSkeletonLoad(): ?array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Loading data',
                    'data' => [],
                    'backgroundColor' => 'rgba(255, 205, 86, 0.2)',
                    'borderColor' => 'rgb(255, 205, 86)',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => [],
        ];
    }
}
