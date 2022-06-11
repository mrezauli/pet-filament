<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Category;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\HasManyRepeater;
use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-s-cog';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationGroup = 'C';

    protected static ?int $navigationSort = 10;

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'slug'];
        //return ['name', 'slug', 'post.title'];
    }

    // public static function getGlobalSearchResultDetails(Model $record): array
    // {
    //     return [
    //         'Author' => $record->author->name,
    //         'Category' => $record->category->name,
    //     ];
    // }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(100),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\Toggle::make('is_visible')
                    ->required(),
                // HasManyRepeater::make('Posts')
                //     ->relationship('posts')
                //     ->schema([
                //         Forms\Components\TextInput::make('title')
                //             ->required()
                //             ->maxLength(50),
                //         Forms\Components\Textarea::make('content')
                //             ->required()
                //             ->maxLength(65535),
                //         BelongsToSelect::make('category_id')
                //             ->relationship('category', 'name')
                //             ->required(),
                //         BelongsToSelect::make('user_id')
                //             ->relationship('user', 'name')
                //             ->required(),
                //     ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\BooleanColumn::make('is_visible'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
            RelationManagers\PostsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'view' => Pages\ViewCategory::route('/{record}'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
