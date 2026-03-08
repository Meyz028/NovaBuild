<?php

namespace Modules\Feedback\Filament\Resources\FeedbackResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Modules\Feedback\Filament\Resources\FeedbackResource;

class ListFeedback extends ListRecords
{
    protected static string $resource = FeedbackResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
