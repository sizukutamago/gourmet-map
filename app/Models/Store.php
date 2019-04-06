<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Store extends Model
{
    public $incrementing = false;

    protected $keyType = 'string';

    protected $guarded = [];

    public function scopeLatlong($q)
    {
        return $q->select(array('*', DB::raw('X(geolocation) as `lat`'), DB::raw('Y(geolocation) as `lng`')));
    }
}
