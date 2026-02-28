<?php

namespace Modules\Projects\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;
use Livewire\Mechanisms\ComponentRegistry;
use Modules\Projects\Providers\CustomComponentRegistry;

class ProjectsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    /**
     * @throws DefinitionException
     */
    public function register(): void
    {
        $panel = Filament::getPanels()['admin'];
        $this->app->singleton(ComponentRegistry::class, CustomComponentRegistry::class);
        $panel->discoverResources(in: base_path('modules/Projects/Filament/Resources'), for: 'Modules\\Projects\\Filament\\Resources');
    }
}
