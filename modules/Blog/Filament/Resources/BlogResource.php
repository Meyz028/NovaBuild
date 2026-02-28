<?php

namespace Modules\Blog\Filament\Resources;

use Archilex\ToggleIconColumn\Columns\ToggleIconColumn;
use Dom\Text;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Illuminate\Support\Str;
use Filament\Tables\Columns\TextColumn;
use Modules\Blog\Filament\Resources\BlogResource\Pages;
use Modules\Blog\Filament\Resources\BlogResource\RelationManagers;
use Modules\Blog\Models\Blog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Concerns\Translatable;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BlogResource extends Resource
{
    use Translatable;

    protected static ?string $model = Blog::class;

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Блоги';

    protected static ?string $modelLabel = 'Блоги';

    protected static ?string $navigationGroup = 'Блог';

    protected static ?string $pluralModelLabel = 'Блоги';

    protected static ?string $slug = 'blogs';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Головна інформація')
                    ->schema([
                        TextInput::make('name')
                            ->label('Назва')
                            ->required(),
                        TextInput::make('slug')
                            ->label('Слаг'),
                        TextInput::make('description')
                            ->label('Опис'),
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
