<?php

namespace io3x1\FilamentCommands\Pages;

use Filament\Pages\Page;
use io3x1\FilamentCommands\Http\Controllers\GuiController;

class Artisan extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-code';

    protected static string $view = 'gui::index';

    protected static ?string $navigationGroup = 'Settings';

    protected static function shouldRegisterNavigation(): bool
    {
        return static::hasCommands() && auth()->user()->isSuperAdmin();
    }

    private static function hasCommands(): bool
    {
        return ! empty((new GuiController)->prepareTojson(config('artisan-gui.commands', [])));
    }

    public function mount(): void
    {
        abort_unless(auth()->user()->isSuperAdmin(), 403);

        abort_unless(static::hasCommands(), 403);
    }
}
