<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customers;
use Illuminate\Support\Facades\Session;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = Customers::orderBy('customer_name')->get();

        $message = Session::get('message');

        return view('customers.index', compact(['customers', 'message']));
    }

    public function show(Customers $customer)
    {
        return view('customers.show', compact('customer'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'customer_name' => 'required|unique:customers',
            'customer_city' => 'required',
            'customer_state' => 'required',
        ]);

        Customers::create([
            'customer_name' => request('customer_name'),
            'customer_city' => request('customer_city'),
            'customer_state' => request('customer_state'),
        ]);

        return redirect('customers');
    }

    public function edit(Customers $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function save(Request $request, Customers $customer)
    {
        $this->validate(request(), [
            'customer_name' => 'required',
            'customer_city' => 'required',
            'customer_state' => 'required',
        ]);

        $customer->customer_name = $request->customer_name;
        $customer->customer_city = $request->customer_city;
        $customer->customer_state = $request->customer_state;
        $customer->customer_phone = $request->customer_phone;
        $customer->save();

        return redirect('customers')->with('message', 'Customer updated successfully!');
    }

    public function destroy(Customers $customer)
    {
        $customer->delete();

        return redirect('customers');
    }
}
