<?php

namespace App\Filament\Resources\CommentResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\CommentResource;
use Filament\Resources\Pages\ListRecords\Concerns\CanEditRecords;
use Filament\Resources\Pages\ListRecords\Concerns\CanViewRecords;
use Filament\Resources\Pages\ListRecords\Concerns\CanCreateRecords;
use Filament\Resources\Pages\ListRecords\Concerns\CanDeleteRecords;

class ListComments extends ListRecords
{
    use ListRecords\Concerns\CanCreateRecords;
    use ListRecords\Concerns\CanEditRecords;
    use ListRecords\Concerns\CanViewRecords;
    use ListRecords\Concerns\CanDeleteRecords;

    protected static string $resource = CommentResource::class;

    //protected static string $view = 'filament.resources.users.pages.list-users';
}
