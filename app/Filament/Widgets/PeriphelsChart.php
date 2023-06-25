<?php

namespace App\Filament\Widgets;

use App\Actions\Trend;
use App\Models\Periphel;
use Filament\Widgets\LineChartWidget;
use Flowframe\Trend\TrendValue;

class PeriphelsChart extends LineChartWidget
{
    protected static ?string $heading = 'Periphels';

    protected static ?int $sort = 7;

    public ?string $filter = 'this_month';

    public bool $readyToLoad = false;

    protected int|string|array $columnSpan = 'full';

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

        $data = Trend::model(Periphel::class)
            ->filterBy($activeFilter)
            ->count();

        $purchased = Trend::model(Periphel::class)
            ->filterBy($activeFilter)
            ->count('purchased_at');

        return [
            'datasets' => [
                [
                    'label' => 'Periphel Publish',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => 'rgba(255, 205, 86, 0.2)',
                    'borderColor' => 'rgb(255, 205, 86)',
                    'borderWidth' => 1,
                ],

                [
                    'label' => 'Purchased ',
                    'data' => $purchased->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgb(75, 192, 192)',
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
