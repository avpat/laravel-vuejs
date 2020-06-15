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
     * Create a charge on a given unit
     * Used when a charge starts on a given unit
     *
     * @param Request $request
     * @param $unitId
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, $unitId)
    {

        //create the Unit and store the charge in the table
        $request->validate([
            'start' => 'required|date_format:Y-m-d H:i:s'
        ]);

        $start = $request->input('start');

        //0 = available,  1 = charging

        $unit = Unit::find($unitId);

        if($unit->update(['status' => 1]))
        {
            if($unit->charges()->create(['start' => $start]))
            {
                return response()->json([
                    'message'   => 'Successful operation',
                    'description'   => 'The fresh ID generated for the added entity.'
                ], 200);
            }

        } else {
            return response()->json([
                'message' => 'Invalid request (invalid unit ID or body)',
            ], 400);
        }
    }
}
