<?php

namespace App\Filament\AdminContext\Resources\PhoneResource\Pages;

use Filament\Pages\Actions;
use App\Filament\AdminContext\Resources\PhoneResource;
use Filament\Resources\Pages\ListRecords;
use Artificertech\FilamentMultiContext\Concerns\ContextualResource;

class ListPhones extends ListRecords
{
    //use ContextualResource;
    
    protected static string $resource = PhoneResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}