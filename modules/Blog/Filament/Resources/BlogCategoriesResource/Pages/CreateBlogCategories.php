<?php

namespace Modules\Blog\Filament\Resources\BlogCategoriesResource\Pages;

use Modules\Blog\Filament\Resources\BlogCategoriesResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\ListRecords;

class CreateBlogCategories extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = BlogCategoriesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
