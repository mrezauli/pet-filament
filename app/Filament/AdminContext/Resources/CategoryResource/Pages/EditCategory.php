<?php

namespace App\Filament\AdminContext\Resources\CategoryResource\Pages;

use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\CategoryResource;
use Artificertech\FilamentMultiContext\Concerns\ContextualPage;

class EditCategory extends EditRecord
{
    //use ContextualPage;
    
    protected static string $resource = CategoryResource::class;
}