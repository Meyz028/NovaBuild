<?php

namespace Modules\Feedback\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;

class FeedbackServiceProvider extends ServiceProvider
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
        $panel->discoverResources(in: base_path('modules/Feedback/Filament/Resources'), for: 'Modules\\Feedback\\Filament\\Resources');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
