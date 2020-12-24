<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;

class InvoiceItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Invoice $invoice)
    {
        $items = InvoiceItem::whereIn('invoice_id', $invoice)->with('invoice')->get();
        $result = [
            "totalrecords" => $items->count(),
            "data" => $items
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
        return InvoiceItem::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @param  \App\Models\InvoiceItem  $item
     */
    public function show(Invoice $invoice, InvoiceItem $item)
    {
        $model = InvoiceItem::find($item);
        return $model;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @param  \App\Models\InvoiceItem  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice, InvoiceItem $item)
    {
        $model = InvoiceItem::findOrFail($item->id);
        $model->update($request->all());
        return $model;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @param  \App\Models\InvoiceItem  $item
     */
    public function destroy(Invoice $invoice, InvoiceItem $item)
    {
        return $item->delete();
    }
}
