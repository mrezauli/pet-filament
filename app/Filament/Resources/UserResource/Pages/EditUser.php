<?php

namespace App\Filament\Resources\UserResource\Pages;


use Filament\Pages\Actions\Action;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\EditRecord\Concerns\HasWizard;

class EditUser extends EditRecord
{
    use HasWizard;

    protected static string $resource = UserResource::class;

    //protected static string $view = 'filament.resources.users.pages.edit-user';

    protected function getSteps(): array
    {
        return [
            // ...
        ];
    }

    protected function getActions(): array
    {
        return array_merge(parent::getActions(), [
            Action::make('impersonate')->action('impersonate'),
        ]);
    }

    public function impersonate(): void
    {
        // ...
    }

    // protected function getFormActions(): array
    // {
    //     return array_merge(parent::getFormActions(), [
    //         Action::make('close')->action('saveAndClose'),
    //     ]);
    // }

    // public function saveAndClose(): void
    // {
    //     // ...
    // }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('view', ['record' => $this->record]);
    }

}
