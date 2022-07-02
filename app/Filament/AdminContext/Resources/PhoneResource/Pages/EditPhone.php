<?php

namespace App\Filament\AdminContext\Resources\PhoneResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\AdminContext\Resources\PhoneResource;
use Artificertech\FilamentMultiContext\Concerns\ContextualResource;

class EditPhone extends EditRecord
{
    //use ContextualResource;
    
    protected static string $resource = PhoneResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}