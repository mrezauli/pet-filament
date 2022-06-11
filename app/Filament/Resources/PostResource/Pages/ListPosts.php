<?php

namespace App\Filament\Resources\PostResource\Pages;

use Illuminate\Database\Query\Builder;
use App\Filament\Resources\PostResource;
use Filament\Resources\Pages\ListRecords;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    // public static function getEloquentQuery(): Builder
    // {
    //     return parent::getEloquentQuery()->whereBelongsTo(auth()->user());
    // }

    


}
