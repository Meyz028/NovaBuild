<?php

namespace Modules\Projects\Filament\Resources;

use Archilex\ToggleIconColumn\Columns\ToggleIconColumn;
use Dom\Text;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Illuminate\Support\Str;
use Filament\Tables\Columns\TextColumn;
use Modules\Projects\Filament\Resources\ProjectCategoriesResource\Pages;
use Modules\Projects\Filament\Resources\ProjectCategoriesResource\RelationManagers;
use Modules\Projects\Models\Category as ProjectCategories;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectCategoriesResource extends Resource
{
    use Translatable;

    protected static ?string $model = ProjectCategories::class;

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Категорії Проектів';

    protected static ?string $modelLabel = 'Категорії Проектів';

    protected static ?string $navigationGroup = 'Проекти';

    protected static ?string $pluralModelLabel = 'Категорії Проектів';

    protected static ?string $slug = 'project-categories';

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
                        Toggle::make('active')
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
                ->offIcon('heroicon-o-lock-closed')
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
            'index' => Pages\ListProjectCategories::route('/'),
            'create' => Pages\CreateProjectCategories::route('/create'),
            'edit' => Pages\EditProjectCategories::route('/{record}/edit'),
        ];
    }
}
