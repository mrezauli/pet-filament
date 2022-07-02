<?php

namespace App\Filament\AdminContext\Resources\CategoryResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Resources\RelationManagers\HasManyRelationManager;

class PostsRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'posts';

    protected static ?string $recordTitleAttribute = 'id';

    protected static bool $hasAssociateAction = true;
    protected static bool $hasDissociateAction = true;
    protected static bool $hasDissociateBulkAction = true;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('title')->required(),
                Forms\Components\MarkdownEditor::make('content'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('title'),
            ])
            ->filters([
                //
            ]);
    }
}