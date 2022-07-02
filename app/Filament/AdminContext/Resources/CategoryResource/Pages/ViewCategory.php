<?php

namespace App\Filament\AdminContext\Resources\CategoryResource\Pages;

use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\CategoryResource;
use Artificertech\FilamentMultiContext\Concerns\ContextualPage;

class ViewCategory extends ViewRecord
{
    //use ContextualPage;
    
    protected static string $resource = CategoryResource::class;
}