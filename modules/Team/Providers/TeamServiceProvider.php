<?php

namespace Modules\Team\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;

class TeamServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    /**
     * @throws DefinitionException
     */
    public function register(): void
    {
        $panel = Filament::getPanels()['admin'];
        $panel->discoverResources(in: base_path('modules/Team/Filament/Resources'), for: 'Modules\\Team\\Filament\\Resources');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
