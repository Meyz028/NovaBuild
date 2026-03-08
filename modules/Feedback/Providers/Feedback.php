<?php

namespace Modules\Feedback\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;

class Feedback extends ServiceProvider
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
        $panel->discoverResources(in: base_path('modules/Blog/Filament/Resources'), for: 'Modules\\Blog\\Filament\\Resources');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}

