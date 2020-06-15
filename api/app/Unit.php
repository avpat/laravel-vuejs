<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Unit extends Model
{
    protected $fillable = ['name', 'address', 'postcode', 'status'];

    protected $unitStatuses = [
        'available',
        'charging'
    ];

    public function getStatusAttribute($value)
    {
        return Arr::get($this->unitStatuses, $value);
    }
}
