<?php

namespace App\Filament\AdminContext\Pages;

use Filament\Forms;
use App\Models\User;
use Filament\Pages\Page;
use Filament\Facades\Filament;
use Filament\Pages\Actions\Action;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\Select;
use Filament\Widgets\StatsOverviewWidget;
use Artificertech\FilamentMultiContext\Concerns\ContextualPage;

class Settings extends Page
{
    use ContextualPage;
    
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.settings';

    protected static ?string $title = 'Custom Page Title';

    protected static ?string $navigationLabel = 'Custom Navigation Label';

    protected static ?string $slug = 'custom-url-slug';

    protected function getHeader(): View
    {
        return view('filament.settings.custom-header');
    }

    protected function getFooter(): View
    {
        return view('filament.settings.custom-footer');
    }

    protected function getActions(): array
    {
        return [
            Action::make('settings')->keyBindings(['command+s', 'ctrl+s'])->modalHeading('Delete posts')->modalSubheading('Are you sure you\'d like to delete these posts? This cannot be undone.')->modalButton('Yes, delete them')->requiresConfirmation()->icon('heroicon-s-cog')->color('secondary')->label('Settings About')->action('openSettingsModal'),
            // Action::make('updateAuthor')
            //     ->action(function (array $data): void {
            //         $this->record->author()->associate($data['authorId']);
            //         $this->record->save();
            //     })
            //     ->form([
            //         Forms\Components\Select::make('authorId')
            //             ->label('Author')
            //             ->options(User::query()->pluck('name', 'id'))
            //             ->required(),
            //     ])
        ];
    }

    public function openSettingsModal(): void
    {
        Filament::notify('warning', 'Saved');
        //$this->dispatchBrowserEvent('open-settings-modal');
    }

    protected static function shouldRegisterNavigation(): bool
    {
        return true;
    }

    // public function mount(): void
    // {
    //     abort_unless(false, 403);
    // }

    protected function getHeaderWidgets(): array
    {
        return [
            //StatsOverviewWidget::class
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            //StatsOverviewWidget::class
        ];
    }
}