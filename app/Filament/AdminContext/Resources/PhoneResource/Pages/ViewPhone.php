<?php

namespace App\Filament\AdminContext\Resources\PhoneResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\AdminContext\Resources\PhoneResource;
use Artificertech\FilamentMultiContext\Concerns\ContextualResource;

class ViewPhone extends ViewRecord
{
    //use ContextualResource;
    
    protected static string $resource = PhoneResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}