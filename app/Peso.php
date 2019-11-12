<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peso extends Model
{
    protected $table = 'peso';
    protected $primaryKey = 'idPeso';
    public $timestamps = false;
}
