<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\Admin;
use App\Models\Charity;
use App\Models\Campaign;
use App\Models\Donation;
use App\Models\Volunteer;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count())
                ->description('User registrations')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('success'),

            Stat::make('Total Admins', Admin::count())
                ->description('Active admins')
                ->descriptionIcon('heroicon-m-shield-check')
                ->color('primary'),

            Stat::make('Total Charities', Charity::where('status', 'active')->count())
                ->description('Active charities')
                ->descriptionIcon('heroicon-m-building-library')
                ->color('info'),

            Stat::make('Total Campaigns', Campaign::where('status', 'active')->count())
                ->description('Ongoing campaigns')
                ->descriptionIcon('heroicon-m-chart-bar')
                ->color('warning'),

            Stat::make('Total Donations', Donation::where('payment_status', 'completed')->count())
                ->description('Successful donations')
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->color('success'),

            Stat::make('Total Volunteers', Volunteer::where('status', 'approved')->count())
                ->description('Registered volunteers')
                ->descriptionIcon('heroicon-m-hand-raised')
                ->color('secondary'),

        ];
    }
}
