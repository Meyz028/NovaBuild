<?php

namespace Modules\Projects\Filament\Resources\ProjectsResource\Pages;

use Modules\Projects\Filament\Resources\ProjectsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProjects extends CreateRecord
{
    protected static string $resource = ProjectsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
