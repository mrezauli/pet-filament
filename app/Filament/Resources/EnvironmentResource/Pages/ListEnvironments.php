<?php

namespace App\Filament\Resources\EnvironmentResource\Pages;

use App\Filament\Resources\EnvironmentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEnvironments extends ListRecords
{
    protected static string $resource = EnvironmentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
