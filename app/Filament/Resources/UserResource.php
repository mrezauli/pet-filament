<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Livewire\Component;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Fieldset;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Collection;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\Pages\SortUsers;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Filament\Resources\UserResource\RelationManagers\RolesRelationManager;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-s-arrow-narrow-down';

    protected static ?string $navigationGroup = 'Relations Manager';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Phone')
                    ->relationship('phone')
                    ->schema([
                        Forms\Components\TextInput::make('number')
                            ->required()
                            ->numeric(),
                    ]),
                static::getNameFormField(),
                static::getFatherNameFormField(),
                static::getMotherNameFormField(),
                // Forms\Components\TextInput::make('name')
                //     ->required()
                //     ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->maxLength(255)
                    ->visibleOn(Pages\CreateUser::class),
                //->visible(fn (Component $livewire): bool => $livewire instanceof Pages\CreateUser),
                //->hiddenOn(Pages\EditUser::class),
                //->hidden(fn (Component $livewire): bool => $livewire instanceof Pages\EditUser),
                Forms\Components\Textarea::make('two_factor_secret')
                    ->maxLength(65535),
                Forms\Components\Textarea::make('two_factor_recovery_codes')
                    ->maxLength(65535),
                // Forms\Components\TextInput::make('name_of_father')
                //     ->maxLength(255),
                // Forms\Components\TextInput::make('name_of_mother')
                //     ->maxLength(255),
                Forms\Components\DatePicker::make('date_of_birth'),
            ]);
    }

    public static function getNameFormField(): Forms\Components\TextInput
    {
        return TextInput::make('name')
            ->required()
            ->maxLength(255);
    }

    public static function getFatherNameFormField(): Forms\Components\TextInput
    {
        return TextInput::make('name_of_father')
            ->maxLength(255);
    }

    public static function getMotherNameFormField(): Forms\Components\TextInput
    {
        return TextInput::make('name_of_mother')
            ->maxLength(255);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('name_of_father'),
                Tables\Columns\TextColumn::make('name_of_mother'),
                Tables\Columns\TextColumn::make('phone.number'),
                Tables\Columns\TextColumn::make('latestOrder.title'),
                Tables\Columns\TextColumn::make('oldestOrder.title'),
                Tables\Columns\TextColumn::make('largestOrder.price'),
                Tables\Columns\TextColumn::make('roles.name'),
                Tables\Columns\TextColumn::make('date_of_birth')
                    ->date(),
            ])
            ->filters([
                //
            ])
            ->defaultSort('email')
            // ->prependActions([
            //     Tables\Actions\Action::make('delete')
            //         ->action(fn (User $record) => $record->delete())
            //         ->requiresConfirmation()
            //         ->color('danger')
            //         ->icon('heroicon-s-cog'),
            // ])
            // ->pushActions([
            //     Tables\Actions\Action::make('deleted')
            //         ->action(fn (User $record) => $record->delete())
            //         ->requiresConfirmation()
            //         ->color('danger')
            //         ->icon('heroicon-s-cog'),
            // ])
            // ->actions([
            //     Tables\Actions\Action::make('edeleted')
            //         ->action(fn (User $record) => $record->delete())
            //         ->requiresConfirmation()
            //         ->color('danger'),
            // ])
            // ->prependBulkActions([
            //     Tables\Actions\BulkAction::make('activated')
            //         ->action(fn (Collection $records) => $records->each->activate())
            //         ->requiresConfirmation()
            //         ->color('success')
            //         ->icon('heroicon-o-check'),
            // ])
            // ->pushBulkActions([
            //     Tables\Actions\BulkAction::make('activate')
            //         ->action(fn (Collection $records) => $records->each->activate())
            //         ->requiresConfirmation()
            //         ->color('success')
            //         ->icon('heroicon-o-check'),
            // ])
            ->bulkActions([
                Tables\Actions\BulkAction::make('activate')
                    ->action(fn (Collection $records) => $records->each->activate())
                    ->requiresConfirmation()
                    ->color('success')
                    ->icon('heroicon-o-check'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RolesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'sort' => Pages\SortUsers::route('/sort'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->update($data);

        return $record;
    }
}
