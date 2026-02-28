<?php

namespace Modules\Projects\Filament\Resources\ProjectCategoriesResource\Pages;

use Modules\Projects\Filament\Resources\ProjectCategoriesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjectCategories extends EditRecord
{
    protected static string $resource = ProjectCategoriesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
