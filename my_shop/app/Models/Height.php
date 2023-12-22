<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Height extends Model
{
    use HasFactory;
    protected $primaryKey='hId';
    protected $table='heights';
    protected $fillable=array('hValue');
}
