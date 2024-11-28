<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Interaction;
use App\Models\Ticket;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        // App::setLocale($locale);
        
        $totalCustomers = Customer::count();
        $recentInteractions = Interaction::latest()
        ->with('customer')
        ->take(5)
        ->get(); 
        $pendingFollowUps = Ticket::where('status', 'in progress')->count();
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

    // public function change(Request $request)
    // {
    //     $lang = $request->lang;

    //     if (!in_array($lang, ['en', 'ms'])) {
    //         abort(400);
    //     }

    //     Session::put('locale', $lang);

    //     return redirect()->back();
    // }

}

