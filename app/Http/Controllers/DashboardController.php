<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Interaction;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCustomers = Customer::count();
        $recentInteractions = Interaction::latest()->take(5)->get(); // Adjust as needed
        $pendingFollowUps = Ticket::where('status', 'in_progress')->count();
        $activeTickets = Ticket::where('status', 'open')->count();
        $ticketStatuses = Ticket::select('status', DB::raw('count(*) as count'))
                                ->groupBy('status')
                                ->pluck('count', 'status');

        return view('dashboard', compact(
            'totalCustomers', 
            'recentInteractions', 
            'pendingFollowUps', 
            'activeTickets',
            'ticketStatuses'
        ));

    }
      
}

