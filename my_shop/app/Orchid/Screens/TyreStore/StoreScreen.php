<?php

namespace App\Orchid\Screens\TyreStore;

use App\Models\Tyre;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;

class StoreScreen extends Screen
{
    public $name = 'Store Screen';
    public $description = 'Store Screen';
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'tyres' => Tyre::with(['brand', 'width', 'height', 'radius', 'country'])->get()
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
            \Orchid\Support\Facades\Layout::table('tyres', [
                TD::make('brand.brandName', 'Производитель')->alignCenter()->width('150px')->filter()->sort('true'),
                TD::make('model', 'Модель')->alignCenter()->width('150px')->style('font-size: 14px; font-weight: bold; color: #333;'),
                TD::make('width.wValue', 'Ширина')->alignCenter()->width('100px')->filter()->sort('true'),
                TD::make('height.hValue', 'Профиль')->alignCenter()->width('100px')->filter()->sort('true'),
                TD::make('radius.rValue', 'Радиус')->alignCenter()->width('100px')->filter()->sort('true'),
                TD::make('country.CountryName', 'Страна')->alignCenter()->width('100px')->filter()->sort('true'),
                TD::make('quantity', 'Количество')->alignCenter()->width('100px'),
                TD::make('price', 'Цена')->alignCenter()->width('100px')->sort('true'),
            ])
        ];
    }
}
