<?php

namespace App\Filament\Resources\PhoneResource\Pages;

use App\Filament\Resources\PhoneResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPhone extends ViewRecord
{
    protected static string $resource = PhoneResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
