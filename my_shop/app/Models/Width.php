<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;
use Orchid\Filters\Filter;

class Width extends Model
{
    use HasFactory;
    use AsSource;
    use Chartable;
    use Filterable;
    use Attachable;

    protected $primaryKey='wId';
    protected $table='widths';
    protected $fillable=array('wValue');

    protected $allowedSort = [
//        'wValue'
    ];
    protected $allowedFilters = [
//        'wValue'=>Width::class,
    ];
}
