<?php

namespace App\Http\Controllers;

use App\Http\Resources\UnitResource;
use App\Http\Resources\UnitResourceCollection;
use App\Unit;

class UnitController extends Controller
{
    /**
     * Get all Units and related Charges
     *
     * @return UnitResourceCollection
     */
    public function index()
    {
        return new UnitResourceCollection(Unit::all());
    }

    /**
     * @param Unit $unit
     * @return UnitResource
     *
     */
    public function show(Unit $unit): UnitResource
    {
        return new UnitResource($unit);
    }
}
