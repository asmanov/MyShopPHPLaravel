<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Where;
use Orchid\Filters\Types\WhereIn;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;
Use Orchid\Platform\Concerns\Sortable;

class Tyre extends Model
{
    use Sortable;
    use HasFactory;
    use AsSource;
    use Sortable;
    use Filterable;
    use Chartable;
    use Attachable;

    protected $primaryKey='id';
    protected $table='tyres';
    protected $fillable=array('brandId', 'model', 'wid', 'hid', 'rid', 'countryid', 'quantity', 'price', 'created_at', 'updated_at');
    protected $allowedSort = [
        'wValue',
        'brandName',
    ];
    protected $allowedFilters = [
        'Width.wId'=> Where::class,
        'brandId'=>WhereIn::class
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brandId');
    }

    public function width()
    {
        return $this->belongsTo(Width::class, 'wid');
    }

    public function height()
    {
        return $this->belongsTo(Height::class, 'hid');
    }

    public function radius()
    {
        return $this->belongsTo(Radius::class, 'rid');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'countryid');
    }
}
