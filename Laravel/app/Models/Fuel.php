<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    protected $table = 'fuel';

    protected $fillable = [
        'type',
    ];
}
