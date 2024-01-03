<?php

namespace App\Orchid\Screens\TyreStore;

use App\Models\Tyre;
use App\Models\Width;
use App\Orchid\Layouts\Tyres\TyresStoreLayout;
use App\Orchid\Layouts\Tyres\WidthLayout;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;

class StoreScreen extends Screen
{
    public $name = 'ШинаСтар';
    public $description = 'Лучший магазин шин';
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'tyres' => Tyre::with(['brand', 'width', 'height', 'radius', 'country'])->get(),
            'widths' => Width::all()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'StoreScreen';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            //
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            TyresStoreLayout::class,
            //WidthLayout::class,
        ];
    }
}
