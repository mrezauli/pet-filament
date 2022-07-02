<?php

namespace App\Filament\AdminContext\Resources\CategoryResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\CategoryResource;
use Artificertech\FilamentMultiContext\Concerns\ContextualPage;

class CreateCategory extends CreateRecord
{
    //use ContextualPage;
    
    protected static string $resource = CategoryResource::class;
}