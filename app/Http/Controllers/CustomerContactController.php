<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerContact;
use Illuminate\Http\Request;

class CustomerContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Customer $customer)
    {
        $contacts = CustomerContact::whereIn('customer_id', $customer)->with('customer')->get();
        $result = [
            "totalrecords" => $contacts->count(),
            "data" => $contacts
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
        return CustomerContact::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @param  \App\Models\CustomerContact  $contact
     */
    public function show(Customer $customer, CustomerContact $contact)
    {
        $model = CustomerContact::find($contact);
        return $model;
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @param  \App\Models\CustomerContact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer, CustomerContact $contact)
    {
        $model = CustomerContact::findOrFail($contact->id);
        $model->update($request->all());
        return $model;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @param  \App\Models\CustomerContact  $contact
     */
    public function destroy(Customer $customer, CustomerContact $contact)
    {
        return $contact->delete();
    }
}
