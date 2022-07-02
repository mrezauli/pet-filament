<?php

namespace App\Filament\AdminContext\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Phone;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PhoneResource\RelationManagers;
use Artificertech\FilamentMultiContext\Concerns\ContextualResource;
use App\Filament\AdminContext\Resources\PhoneResource\Pages\EditPhone;
use App\Filament\AdminContext\Resources\PhoneResource\Pages\ViewPhone;
use App\Filament\AdminContext\Resources\PhoneResource\Pages\ListPhones;
use App\Filament\AdminContext\Resources\PhoneResource\Pages\CreatePhone;

class PhoneResource extends Resource
{
    use ContextualResource;
    
    protected static ?string $model = Phone::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('number')
                    ->required(),
                Forms\Components\TextInput::make('user_id')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('number'),
                // Tables\Columns\TextColumn::make('user_id'),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime(),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
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
            'index' => ListPhones::route('/'),
            'create' => CreatePhone::route('/create'),
            'view' => ViewPhone::route('/{record}'),
            'edit' => EditPhone::route('/{record}/edit'),
        ];
    }    
    
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}