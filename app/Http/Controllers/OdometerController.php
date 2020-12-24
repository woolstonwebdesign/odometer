<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Odometer;
use App\Models\Vehicle;

/**
 * https://laraveldaily.com/nested-resource-controllers-and-routes-laravel-crud-example/
 */
class OdometerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Vehicle $vehicle)
    {
        $odometers = Odometer::whereIn('vehicle_id', $vehicle)->with('vehicle')->get();
        $result = [
            "totalrecords" => $odometers->count(),
            "data" => $odometers
        ];
        return $result;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Odometer::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle, Odometer $odometer)
    {
        $model = Odometer::find($odometer);
        return $model;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle, Odometer $odometer)
    {
        $model = Odometer::findOrFail($odometer->id);
        $model->update($request->all());
        return $model;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(vehicle $vehicle, Odometer $odometer)
    {
        return $odometer->delete();
    }
}
