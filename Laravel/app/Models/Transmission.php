<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transmission extends Model
{
    protected $table = 'transmission';

    protected $fillable = [
        'type',
    ];
}
