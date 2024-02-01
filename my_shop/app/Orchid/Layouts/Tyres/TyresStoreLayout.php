<?php

namespace App\Orchid\Layouts\Tyres;

use App\Models\Tyre;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class TyresStoreLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'tyres';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('brand.brandName', 'Производитель')
                ->alignCenter()->width('150px')->filter()->sort('true'),
            TD::make('model', 'Модель')->alignCenter()
                ->width('150px')->style('font-size: 14px; font-weight: bold; color: #333;'),
            TD::make('width.wValue', 'Ширина')->alignCenter()
                ->width('100px')->filter()->sort('true'),
            TD::make('height.hValue', 'Профиль')->alignCenter()
                ->width('100px')->filter()->sort('true'),
            TD::make('radius.rValue', 'Радиус')->alignCenter()
                ->width('100px')->filter()->sort('true'),
            TD::make('country.CountryName', 'Страна')->alignCenter()
                ->width('100px')->filter()->sort('true'),
            TD::make('quantity', 'Количество')->alignCenter()
                ->width('100px'),
            TD::make('price', 'Цена')->alignCenter()
                ->width('100px')->sort('true'),
            TD::make('action')->render(function (Tyre $tyre){
                return ModalToggle::make('Редактировать')
                    ->modal('editTyre')
                    ->method('update')
                    ->modalTitle('Редактировать данные')
                    ->asyncParameters([
                        'tyreId' => $tyre
                    ]);
            })
            ];
    }
}
