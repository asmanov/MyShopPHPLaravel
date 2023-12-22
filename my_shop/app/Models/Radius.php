<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Radius extends Model
{
    use HasFactory;
    protected $primaryKey='rId';
    protected $table='radiuses';
    protected $fillable=array('rValue');
}
