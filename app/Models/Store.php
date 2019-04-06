<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public $incrementing = false;

    protected $keyType = 'string';

    protected $guarded = [];
}
