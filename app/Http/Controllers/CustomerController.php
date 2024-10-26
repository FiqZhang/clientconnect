<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
{
    // Retrieve the status input
    $status = $request->input('status');

    // Build the query for tickets
    $tickets = Ticket::with(['customer', 'assignedUser'])
        ->when($status, function ($query) use ($status) {
            return $query->where('status', $status);
        })
        ->paginate(10);

    return view('tickets.index', compact('tickets'));
}

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'id_number' => 'required|string|max:255|unique:customers',
            'phone_number' => 'required|string|max:255',
            'address' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers,email,' . $customer->id,
            'id_number' => 'required|string|max:255|unique:customers,id_number,' . $customer->id,
            'phone_number' => 'required|string|max:255',
            'address' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
