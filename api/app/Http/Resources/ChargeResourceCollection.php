<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ChargeResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        $charges = array();
        foreach ($this->resource as $charge) {
            $charges[] = array(
                'id'        => $charge->id,
                'start'     => $charge->start,
                'end'       => $charge->end,
            );
        }

        return $charges;
    }
}
