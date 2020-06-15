<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Unit extends Model
{
    protected $guarded =[];
    /**
     * @var array
     */
    protected $fillable = ['name', 'address', 'postcode', 'status'];

    /**
     * @var array
     */
    protected $unitStatuses = [
        'available',
        'charging'
    ];

    protected $with = ['charges'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function charges()
    {
        return $this->hasMany('App\Charge', 'unit_id');
    }

    /**
     * using accessors way to handle enums
     * @param $value
     * @return mixed
     */
    public function getStatusAttribute($value)
    {
        return Arr::get($this->unitStatuses, $value);
    }
}
