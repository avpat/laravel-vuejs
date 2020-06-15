<?php

namespace App\Http\Controllers;

use App\Http\Resources\UnitResource;
use App\Http\Resources\UnitResourceCollection;
use App\Unit;
use App\Charge;
use Illuminate\Http\Request;

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

    /**
     * @param Request $request
     * @param $unitId
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, $unitId)
    {

        //create the Unit and store the charge in the table
        $request->validate([
            'start' => 'required'
        ]);
        $start = $request->input('start');

        $unit = Unit::firstOrNew(['id' => $unitId]);

        $unit->charges()->create(['start' => $start]);

        return response()->json($unit, 201);
    }
}
