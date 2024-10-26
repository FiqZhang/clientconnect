<?php

namespace App\Http\Controllers;

use App\Models\Interaction;
use App\Models\Customer;
use Illuminate\Http\Request;

class InteractionController extends Controller
{
    public function index(Customer $customer)
    {
        $interactions = $customer->interactions;
        return view('interactions.index', compact('customer', 'interactions'));
    }

    public function create(Customer $customer)
    {
        return view('interactions.create', compact('customer'));
    }

    public function store(Request $request, Customer $customer)
    {
        $request->validate([
            'interaction_date' => 'required|date',
            'type' => 'required|string|in:email,phone_call,meeting',
            'notes' => 'nullable|string',
        ]);

        $customer->interactions()->create($request->all());

        return redirect()->route('customers.interactions.index', $customer)
            ->with('success', 'Interaction logged successfully');
    }
}

