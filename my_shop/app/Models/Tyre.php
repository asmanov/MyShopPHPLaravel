<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Tyre extends Model
{
    use HasFactory;
    use AsSource;
    protected $primaryKey='id';
    protected $table='tyres';
    protected $fillable=array('brandId', 'model', 'wid', 'hid', 'rid', 'countryid', 'quantity', 'price', 'created_at', 'updated_at');

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
