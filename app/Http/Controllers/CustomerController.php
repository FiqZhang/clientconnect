<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use PDF;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
       
        // $customers = Customer::all();
        $search = $request->input('search');    

        $customers = Customer::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->paginate(10);

        if (request()->has('generate-pdf')) {
            $search = $request->input('search');
        

        $customers = Customer::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->get();
               

            return response()->streamDownload(
                function () use ($customers) {
                    $pdf = \PDF::loadView('customers.customers-pdf', [
                        'customers' => $customers   
                    ]);
                    echo $pdf->output();
                },
                'CustomersList.pdf',
                [
                    'Content-Type' => 'application/pdf',
                ]
            );
        
        }
    
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        // Gate::authorize('create');
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
        Gate::authorize('update',$customer);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers,email,' . $customer->id,
            'id_number' => 'required|string|max:255|unique:customers,id_number,' . $customer->id,
            'phone_number' => 'required|string|max:255',
            'address' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $customer->update($request->all());

        // return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
        return back()->with('success', 'Customer updated successfully.');
        
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }

}