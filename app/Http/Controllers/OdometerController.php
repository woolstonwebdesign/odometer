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
    public function index($vehicleId)
    {
        $odometers = Odometer::where('vehicle_id', $vehicleId);
        return $odometers->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($vehicle_id, Request $request)
    {
        return Odometer::create($request->all() + ['vehicle_id' => $vehicle_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($vehicle_id, Odometer $odometer)
    {
        return Odometer::find($odometer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($vehicle_id, Odometer $odometer)
    {
        return response()->json(['message' => 'Not Found!'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($vehicle_id, Request $request, Odometer $odometer)
    {
        $odometer->update($request->all());
        return $odometer;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Odometer::destroy($id);
    }
}
