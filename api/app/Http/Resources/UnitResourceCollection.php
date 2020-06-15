<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UnitResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $units = array();
        foreach ($this->resource as $unit) {
            $units[] = array(
                'id'        => $unit->id,
                'address'   => $unit->address,
                'postcode'  => $unit->postcode,
                'name'      => $unit->name,
                'status'    => $unit->status,
                'charges'   => ChargeResource::collection($unit->charges),
            );
        }

        return $units;

    }
}
