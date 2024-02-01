<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Where;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;
use Orchid\Filters\Filter;
use Orchid\Platform\Concerns\Sortable;

class Width extends Model
{
    use Sortable;
    use Filterable;
    use HasFactory;
    use AsSource;
    use Chartable;
    use Attachable;

    protected $primaryKey='wId';
    protected $table='widths';
    protected $fillable=array('wValue');

    protected $allowedSort = [
        'wValue'
    ];
    protected $allowedFilters = [
        'wValue'=>Where::class,
    ];
}
