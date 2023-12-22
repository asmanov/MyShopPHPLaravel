<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Width extends Model
{
    protected $primaryKey='wId';
    protected $table='widths';
    protected $fillable=array('wValue');
}
