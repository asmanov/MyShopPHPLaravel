<?php

namespace App\Orchid\Screens\TyreStore;

use App\Models\Brand;
use App\Models\Country;
use App\Models\Height;
use App\Models\Radius;
use App\Models\Tyre;
use App\Models\Width;
use App\Orchid\Layouts\Tyres\TyresStoreLayout;
use App\Orchid\Layouts\Tyres\WidthLayout;
use http\Client;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Filters\Filter;
use Illuminate\Http\Request;

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
            'tyre' => Tyre::with('brand', 'width', 'height', 'radius', 'country')->find(1),
            'tyres' => Tyre::filters()->defaultSort('brandId')->with(['brand', 'width', 'height', 'radius', 'country'])
                ->paginate(),
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
            ModalToggle::make('Добавить шину')
                ->modal('tyreItem')
                ->method('addTyre'),
            ModalToggle::make('Edit')->modal('editTyre')
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        \Log::info($this->query()['tyre']);

        return [
            TyresStoreLayout::class,
            //WidthLayout::class,
            \Orchid\Support\Facades\Layout::modal('tyreItem', \Orchid\Support\Facades\Layout::rows([
                Select::make('brand')->fromModel(Brand::class, 'brandName')->title('Производитель')->empty(),
                Input::make('model')->title('Модель'),
                Group::make([
                    Select::make('width')->fromModel(Width::class, 'wValue')->title('Ширина')->empty(),
                    Select::make('height')->fromModel(Height::class, 'hValue')->title('Высота')->empty(),
                    Select::make('radius')->fromModel(Radius::class, 'rValue')->title('Радиус')->empty(),
                ]),
                Select::make('country')->fromModel(Country::class, 'CountryName')->title('Страна')->empty(),
                Input::make('quantity')->title('Количество'),
                Input::make('price')->title('Цена'),
            ]))->title('Добавление модели шины'),

        ];
    }

    public function addTyre(WidthRequest $request){
        $brand = $request->input('brand');
        $model = $request->input('model');
        $width = $request->input('width');
        $height = $request->input('height');
        $radius = $request->input('radius');
        $country = $request->input('country');
        $quantity = $request->input('quantity');
        $price = $request->input('price');
        Tyre::create(
            [
                'brandId' => $brand,
                'model' => $model,
                'wid' => $width,
                'hid' => $height,
                'rid' => $radius,
                'countryid' => $country,
                'quantity' => $quantity,
                'price' => $price
            ]
        );
    }
}
