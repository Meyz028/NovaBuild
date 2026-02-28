<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\Filament\AdminPanelProvider::class,
    Modules\Projects\Providers\ProjectsServiceProvider::class,
    Modules\Auth\Providers\UserServiceProvider::class,
    Modules\Blog\Providers\BlogServiceProvider::class,
];
