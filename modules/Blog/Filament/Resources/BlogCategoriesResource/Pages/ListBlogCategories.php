<?php

namespace Modules\Blog\Filament\Resources\BlogCategoriesResource\Pages;

use Modules\Blog\Filament\Resources\BlogCategoriesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBlogCategories extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = BlogCategoriesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
