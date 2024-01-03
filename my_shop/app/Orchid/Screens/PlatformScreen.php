<?php

declare(strict_types=1);

namespace App\Orchid\Screens;

use App\Orchid\Layouts\Tyres\TyresStoreLayout;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class PlatformScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'StarTyres';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return 'Welcome to admin panel your shop.';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            /*Layout::view('platform::partials.update-assets'),
            Layout::view('platform::partials.welcome'),*/
        ];
    }
}
