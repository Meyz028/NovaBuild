<?php

namespace Modules\Blog\Filament\Resources\BlogResource\Pages;

use Modules\Blog\Filament\Resources\BlogResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\ListRecords;

class CreateBlog extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = BlogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}

