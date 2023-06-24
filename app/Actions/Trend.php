<?php

namespace App\Actions;

use Flowframe\Trend\Trend as TrendAction;

class Trend extends TrendAction
{
    public static function filterType()
    {
        return [
            'today' => 'Today',
            'yesterday' => 'Yesterday',
            'this_week' => 'This Week',
            'last_week' => 'Last Week',
            'this_month' => 'This Month',
            'last_month' => 'Last Month',
            'this_year' => 'This Year',
            'last_year' => 'Last Year',
            'all_time' => 'All Time',
        ];
    }

    public function filterBy($filer)
    {
        if ($filer === 'today') {
            return $this->between(
                start: now()->startOfDay(),
                end: now(),
            )->perHour();
        }

        if ($filer === 'yesterday') {
            return $this->between(
                start: now()->subDay()->startOfDay(),
                end: now()->subDay()->endOfDay(),
            )->perHour();
        }

        if ($filer === 'this_week') {
            return $this->between(
                start: now()->startOfWeek(),
                end: now()->endOfWeek(),
            )->perDay();
        }

        if ($filer === 'last_week') {
            return $this->between(
                start: now()->subWeek()->startOfWeek(),
                end: now()->subWeek()->endOfWeek(),
            )->perDay();
        }

        if ($filer === 'this_month') {
            return $this->between(
                start: now()->startOfMonth(),
                end: now(),
            )->perDay();
        }

        if ($filer === 'last_month') {
            return $this->between(
                start: now()->subMonth()->startOfMonth(),
                end: now()->subMonth()->endOfMonth(),
            )->perDay();
        }

        if ($filer === 'this_year') {
            return $this->between(
                start: now()->startOfYear(),
                end: now(),
            )->perMonth();
        }

        if ($filer === 'last_year') {
            return $this->between(
                start: now()->subYear()->startOfYear(),
                end: now()->subYear()->endOfYear(),
            )->perMonth();
        }

        if ($filer === 'all_time') {
            // get mimium year from data
            // $minYear = $this->builder->min($this->dateColumn)->year;
            return $this->between(
                start: now()->subYear(10)->startOfYear(),
                end: now(),
            )->perYear();
        }

        return $this;
    }
}
