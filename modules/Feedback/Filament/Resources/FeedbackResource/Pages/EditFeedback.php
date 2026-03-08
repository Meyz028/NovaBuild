<?php

namespace Modules\Feedback\Filament\Resources\FeedbackResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Feedback\Filament\Resources\FeedbackResource;

class EditFeedback extends EditRecord
{
    protected static string $resource = FeedbackResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
