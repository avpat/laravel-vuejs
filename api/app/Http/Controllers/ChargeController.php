<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;

class ChargeController extends Controller
{
    /**
     * Create a charge on a given unit
     *
     * @description Used when a charge starts on a given unit
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
        $unit = Unit::where('id', $unitId)->first();

        if ($unit && $unit->update(['status' => 1])) {
            if ($unit->charges()->create(['start' => $start])) {
                return response()->json([
                    'message'       => 'Successful operation',
                    'description'   => 'The fresh ID generated for the added entity.',
                    'statusCode'    => 200
                ], 200);
            }
        } else {
            return response()->json([
                'error' => [
                    'message'       => 'Invalid request (invalid unit ID or body)',
                    'unitId'        => $unitId,
                    'statusCode'    => 400
                ]
            ], 400);
        }
    }


    /**
     * Update a charge on a given unit
     *
     * @description Used when a charge stops on a given unit
     *
     * @param $unitId
     * @param $chargeId
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($unitId, $chargeId, Request $request)
    {

        //find the Unit and update the charge end time
        $request->validate([
            'end'     => 'required|date_format:Y-m-d H:i:s'
        ]);

        $end = $request->input('end');

        $unit = Unit::find($unitId);


        if (!$unit) {
            return response()->json([
                'error' => [
                    'message'       => 'Charge not found',
                    'chargeId'      => $chargeId,
                    'statusCode'    => 400
                ]
            ], 400);
        }

        //0 = available,  1 = charging
        if ($unit && $unit->update(['end' => 0])) {
            if ($unit->charges()->update(['end' => $end])) {
                return response()->json([
                    'message'   => 'Successful operation',
                    'description'   => 'The fresh ID generated for the added entity.',
                    'statusCode'    => 200
                ], 200);
            } else {
                return response()->json([
                    'error' => [
                        'message'       => 'An error occured. Id\'s did not match',
                        'unitId'        => $unitId,
                        'chargeId'      => $chargeId,
                        'statusCode'    => 400
                    ]
                ], 400);
            }
        } else {
            return response()->json([
                'error' => [
                    'message'       => 'Invalid request (invalid unit ID or body)',
                    'unitId'        => $unitId,
                    'chargeId'      => $chargeId,
                    'statusCode'    => 400
                ]
            ], 400);
        }
    }
}
