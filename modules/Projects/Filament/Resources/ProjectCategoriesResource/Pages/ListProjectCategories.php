<?php

namespace Modules\Projects\Filament\Resources\ProjectCategoriesResource\Pages;

use Modules\Projects\Filament\Resources\ProjectCategoriesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProjectCategories extends ListRecords
{
    protected static string $resource = ProjectCategoriesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
