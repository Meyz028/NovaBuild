<?php

namespace Modules\Blog\Filament\Resources\BlogCategoriesResource\Pages;

use Modules\Blog\Filament\Resources\BlogCategoriesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\ListRecords;

class EditBlogCategories extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = BlogCategoriesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
