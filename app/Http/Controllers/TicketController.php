<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\TicketsExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\CarbonPeriod;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;


class TicketController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->input('status');

        $senaraiBulan = CarbonPeriod::create(
            Carbon::now()->startOfYear(),
            '1 month',
            Carbon::now()->endOfYear(),
        ); 

        // $tickets = Ticket::with(['customer', 'assignedUser'])
        // ->when($request->filled('status'), function ($query) use ($request) {
        //     $query->where('status', $request->query('status'))
        // ->when($request->filled('bulan'), function ($query) {
        //         $query->whereMonth('created_at', request()->query('bulan'));
        //     });
        // })
        $tickets = Ticket::with(['customer', 'assignedUser'])
    ->when($request->filled('status'), function ($query) use ($request) {
        $query->where('status', $request->query('status'));
    })
    ->when($request->filled('bulan'), function ($query) {
        $query->whereMonth('created_at', request()->query('bulan'));
    })->paginate(10);
   



  
       
        // dd($tickets);
         if (request()->has('generate-excel')) {

            $tickets = Ticket::with(['customer', 'assignedUser'])
                ->when($request->filled('status'), function ($query) use ($request) {
                    $query->where('status', $request->query('status'));
                })
                ->paginate(1000);

                return response()->streamDownload(
                    function () use ($tickets) {
                        
                      
                        echo view('tickets.tickets-csv', compact('tickets'))->render();
                    },
                    'tickets-excel.xls',
                    [
                        'Content-Type' => 'application/vnd.ms-excel'
,
                    ]
                );
            }

        return view('tickets.index', compact('tickets','senaraiBulan'));
    }

    public function create()
    {
        $customers = Customer::all();
        $users = User::all();
        return view('tickets.create', compact('customers', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:open,in_progress,resolved,closed',
            'priority' => 'required|in:low,medium,high',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        Ticket::create($request->all());

        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully.');
    }

    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }

    public function edit(Ticket $ticket)
    {
        $customers = Customer::all();
        $users = User::all();
        return view('tickets.edit', compact('ticket', 'customers', 'users'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:open,in_progress,resolved,closed',
            'priority' => 'required|in:low,medium,high',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $ticket->update($request->all());

        return redirect()->route('tickets.index')->with('success', 'Ticket updated successfully.');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success', 'Ticket deleted successfully.');
    }

  
}
