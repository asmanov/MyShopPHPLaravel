<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;

class Country extends Model
{
    use HasFactory;
    use AsSource;
    use Chartable;
    use Filterable;
    use Attachable;

    protected $primaryKey='CountryId';
    protected $table='countries';
    protected $fillable=array('CountryName');
}
