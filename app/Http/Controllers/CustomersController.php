<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customers;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = Customers::orderBy('customer_name')->get();

        return view('customers.index', compact('customers'));
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

    public function destroy()
    {


        return redirect('customers');
    }
}
