<?php

namespace App\Providers;

use App\Filament\Widgets\DonatioTableWidget;
use App\Filament\Widgets\StatsOverview;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();

        Filament::registerWidgets([
            StatsOverview::class,
            DonatioTableWidget::class,
        ]);
    }
}
