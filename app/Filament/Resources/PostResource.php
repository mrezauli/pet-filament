<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Illuminate\Database\Query\Builder;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\PostResource\Pages;
use Filament\Forms\Components\BelongsToSelect;
use App\Filament\Resources\PostResource\Pages\EditPost;
use App\Filament\Resources\PostResource\Pages\ViewPost;
use App\Filament\Resources\PostResource\Pages\ListPosts;
use App\Filament\Resources\PostResource\Pages\CreatePost;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Filament\Resources\PostResource\RelationManagers\CommentsRelationManager;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-eye-off';

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationGroup = 'Relations Manager';

    // protected function getTableQuery(): Builder
    // {
    //     return parent::getTableQuery()->withoutGlobalScopes();
    // }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(50),
                Forms\Components\Textarea::make('content')
                    ->required()
                    ->maxLength(65535),
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                Repeater::make('comments')
                    ->relationship()
                    ->schema([
                        Forms\Components\Textarea::make('content')
                            ->required()
                            ->maxLength(65535),
                    ])
                // Fieldset::make('Category')
                //     ->relationship('category')
                //     ->schema([
                //         TextInput::make('name')->required(),
                //         Textarea::make('slug'),
                //     ]),
                //Forms\Components\TextInput::make('user_id')
                // BelongsToSelect::make('user_id')
                //     ->relationship('user', 'name')
                //     ->required(),
            ]);
    }

    protected function handleRecordCreation(array $data): Model
    {
        return static::getModel()::create($data);
    }





    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('content'),
                Tables\Columns\TextColumn::make('category_id'),
                Tables\Columns\TextColumn::make('user_id'),
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
            CommentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'view' => Pages\ViewPost::route('/{record}'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}