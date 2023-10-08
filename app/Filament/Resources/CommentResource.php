<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use App\Models\Video;
use App\Models\Comment;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\MorphToSelect;
use App\Filament\Resources\CommentResource\Pages;
use App\Filament\Resources\CommentResource\RelationManagers;
use App\Filament\Resources\CommentResource\RelationManagers\PostRelationManager;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static ?string $navigationIcon = 'heroicon-s-moon';

    protected static ?string $recordTitleAttribute = 'content';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'C';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('content')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\Textarea::make('body')
                    ->required()
                    ->maxLength(65535),
                MorphToSelect::make('commentable')
                    ->types([
                        MorphToSelect\Type::make(Video::class)->titleColumnName('title'),
                        MorphToSelect\Type::make(Post::class)->titleColumnName('title'),
                    ]),
                // Select::make('post_id')
                //     ->relationship('post', 'title')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('content'),
                // Tables\Columns\TextColumn::make('post.title'),
                Tables\Columns\TextColumn::make('commentable_type'),
                Tables\Columns\TextColumn::make('commentable_id'),
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListComments::route('/'),
            'create' => Pages\CreateComment::route('/create'),
            'view' => Pages\ViewComment::route('/{record}'),
            'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }
}
