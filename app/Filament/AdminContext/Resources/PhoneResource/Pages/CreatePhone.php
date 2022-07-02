<?php

namespace App\Filament\AdminContext\Resources\PhoneResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\AdminContext\Resources\PhoneResource;
use Artificertech\FilamentMultiContext\Concerns\ContextualResource;

class CreatePhone extends CreateRecord
{
    //use ContextualResource;
    
    protected static string $resource = PhoneResource::class;
}