<?php

namespace App\Filament\AdminContext\Resources\CategoryResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\CategoryResource;
use Artificertech\FilamentMultiContext\Concerns\ContextualPage;

class ListCategories extends ListRecords
{
    //use ContextualPage;
    
    protected static string $resource = CategoryResource::class;
}