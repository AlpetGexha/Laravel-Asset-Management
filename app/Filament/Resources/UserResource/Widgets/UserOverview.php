<?php

namespace App\Filament\Resources\UserResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class UserOverview extends BaseWidget
{
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

        return [
            //
        ];
    }

    protected function skeletonLoad(): array
    {
        return [
            Card::make('Loading Data', 'loading...'),
        ];
    }
}
