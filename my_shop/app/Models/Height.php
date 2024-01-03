<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;

class Height extends Model
{
    use HasFactory;
    use AsSource;
    use Chartable;
    use Filterable;
    use Attachable;

    protected $primaryKey='hId';
    protected $table='heights';
    protected $fillable=array('hValue');
}
