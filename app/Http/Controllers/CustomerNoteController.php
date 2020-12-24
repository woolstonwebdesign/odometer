<?php

namespace App\Http\Controllers;

use App\Models\CustomerNote;
use Illuminate\Http\Request;

class CustomerNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Customer $customer)
    {
        $notes = CustomerNote::whereIn('customer_id', $customer)->with('customer')->get();
        return $notes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return CustomerNote::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerNote  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $note)
    {
        $model = CustomerNote::find($note);
        return $model;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerNote  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerNote $note)
    {
        $model = CustomerNote::find($note);
        $model->update($request->all());
        return $model;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerNote  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerNote $note)
    {
        return $note->delete();
    }
}
