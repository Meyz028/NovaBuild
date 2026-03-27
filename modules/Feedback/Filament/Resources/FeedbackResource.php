<?php

namespace Modules\Feedback\Filament\Resources;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\Feedback\Filament\Resources\FeedbackResource\Pages;
use Modules\Feedback\Models\FeedbackCustomers;

class FeedbackResource extends Resource
{
    use Translatable;

    protected static ?string $model = FeedbackCustomers::class;

    protected static ?int $navigationSort = 6;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Відгуки';

    protected static ?string $modelLabel = 'Відгуки';

    protected static ?string $navigationGroup = 'Відгуки';

    protected static ?string $pluralModelLabel = 'Відгуки';

    protected static ?string $slug = 'feedback_customers';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Головна інформація')
                    ->schema([
                        TextInput::make('name')
                            ->label('Назва')
                            ->required(),
                        TextInput::make('second_name')
                            ->label('Прізвище')
                            ->required(),
                        TextInput::make('email')
                            ->label('Email')
                            ->required(),
                        TextInput::make('message')
                            ->label('Повідомлення')
                            ->required(),
                        TextInput::make('rating')
                            ->numeric()
                            ->label('Рейтинг')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('name')
                    ->label('Назва')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('second_name')
                    ->label('Прізвище')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('message')
                    ->label('Повідомлення')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('rating')
                    ->numeric()
                    ->label('Рейтинг')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFeedback::route('/'),
            'create' => Pages\CreateFeedback::route('/create'),
            'edit' => Pages\EditFeedback::route('/{record}/edit'),
        ];
    }
}
