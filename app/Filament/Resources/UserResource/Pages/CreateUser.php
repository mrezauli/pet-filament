<?php

namespace App\Filament\Resources\UserResource\Pages;

use Illuminate\Support\Str;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Fieldset;
use App\Filament\Resources\UserResource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Wizard\Step;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\BelongsToManyMultiSelect;
use Filament\Forms\Components\BelongsToManyCheckboxList;
use Filament\Resources\Pages\CreateRecord\Concerns\HasWizard;

class CreateUser extends CreateRecord
{
    use HasWizard;

    protected static string $resource = UserResource::class;

    //protected static string $view = 'filament.resources.users.pages.create-user';

    protected function getSteps(): array
    {
        return [
            Step::make('Name')
                ->description('Give the name & name of your father, mother')
                ->schema([
                    // TextInput::make('name')
                    //     ->required()
                    //     ->maxLength(255),
                    // TextInput::make('name_of_father')
                    //     ->maxLength(255),
                    // TextInput::make('name_of_mother')
                    //     ->maxLength(255),
                    UserResource::getNameFormField(),
                    UserResource::getFatherNameFormField(),
                    UserResource::getMotherNameFormField(),
                ]),
            Step::make('Description')
                ->description('Add some extra details')
                ->schema([
                    DatePicker::make('date_of_birth'),
                    Fieldset::make('Phone')
                        ->relationship('phone')
                        ->schema([
                            TextInput::make('number'),
                        ]),
                    TextInput::make('email')
                        ->email()
                        ->required()
                        ->maxLength(255),
                    TextInput::make('password')
                        ->password()
                        ->maxLength(255)
                        ->visibleOn(Pages\CreateUser::class),
                    // BelongsToManyMultiSelect::make('Roles')
                    //     ->relationship('roles', 'name'),
                    // Select::make('Roles')
                    //     ->multiple()
                    //     ->relationship('roles', 'name'),
                    CheckboxList::make('Roles')
                        ->relationship('roles', 'name')
                ])
        ];
    }
}
