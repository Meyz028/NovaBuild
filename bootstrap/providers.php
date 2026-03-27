<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\Filament\AdminPanelProvider::class,
    Modules\Auth\Providers\UserServiceProvider::class,
    Modules\Blog\Providers\BlogServiceProvider::class,
    Modules\Feedback\Providers\FeedbackServiceProvider::class,
    Modules\Projects\Providers\ProjectsServiceProvider::class,
    Modules\Team\Providers\TeamServiceProvider::class,
];
