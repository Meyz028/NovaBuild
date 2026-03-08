<?php

namespace Modules\Projects\Filament\Resources;

use Archilex\ToggleIconColumn\Columns\ToggleIconColumn;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\Projects\Filament\Resources\ProjectsResource\Pages;
use Modules\Projects\Models\Projects;

class ProjectsResource extends Resource
{
    use Translatable;

    protected static ?string $model = Projects::class;

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Проекти';

    protected static ?string $modelLabel = 'Проекти';

    protected static ?string $navigationGroup = 'Проекти';

    protected static ?string $pluralModelLabel = 'Проекти';

    protected static ?string $slug = 'projects';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Головна інформація')
                    ->schema([
                        TextInput::make('name')
                            ->label('Назва')
                            ->required(),
                        TextInput::make('description')
                            ->label('Опис')
                            ->required(),
                        TextInput::make('slug')
                            ->label('Слаг'),
                        Toggle::make('is_active')
                            ->label('Статус')
                            ->default(false),
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
                TextColumn::make('description')
                    ->label('Опис')
                    ->searchable(),
                TextColumn::make('slug')
                    ->label('Слаг')
                    ->sortable()
                    ->searchable(),
                ToggleIconColumn::make('active')
                    ->label('Статус')
                    ->onIcon('heroicon-s-lock-open')
                    ->offIcon('heroicon-o-lock-closed'),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProjects::route('/create'),
            'edit' => Pages\EditProjects::route('/{record}/edit'),
        ];
    }
}
