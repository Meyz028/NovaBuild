<?php

return [
    App\Providers\AppServiceProvider::class,
    Modules\Feedback\Providers\FeedbackServiceProvider::class,
    App\Providers\Filament\AdminPanelProvider::class,
    Modules\Team\Providers\TeamServiceProvider::class,
    Modules\Auth\Providers\UserServiceProvider::class,
    Modules\Blog\Providers\BlogServiceProvider::class,
    Modules\Projects\Providers\ProjectsServiceProvider::class,
];
