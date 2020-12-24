<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Customer;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Customer $customer)
    {
        $invoices = Invoice::whereIn('customer_id', $customer)->with('customer')->get();
        $result = [
            "totalrecords" => $invoices->count(),
            "data" => $invoices
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
        return Invoice::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @param  \App\Models\Invoice  $invoice
     */
    public function show(Customer $customer, Invoice $invoice)
    {
        $model = Invoice::find($invoice);
        return $model;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer, Invoice $invoice)
    {
        $model = Invoice::findOrFail($invoice->id);
        $model->update($request->all());
        return $model;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @param  \App\Models\Invoice  $invoice
     */
    public function destroy(Customer $customer, Invoice $invoice)
    {
        return $invoice->delete();
    }
}
