<x-app-layout>
    <x-slot name="header">

        {{-- <div class="mb-3 d-flex justify-content-end" >
            <a href="{{ route('dashboard','en')}}" class="btn btn-dark me-2">English</a>
            <a href="{{ route('dashboard','ms')}}" class="btn btn-dark">Malay</a>
        </div> --}}

        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('dash.Dashboard') }}
        </h2>

    </x-slot>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">{{ __('dash.Total Customers') }}</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $totalCustomers }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-secondary mb-3">
                    <div class="card-header">{{ __('dash.Pending Follow-Ups') }}</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $pendingFollowUps }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">{{ __('dash.Active Tickets') }}</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $activeTickets }}</h5>
                    </div>
                </div>
            </div>
        </div>
    
        <h4 class="mt-4"> {{__('dash.Recent Interactions') }}</h4>
        <ul class="list-group">
            @foreach ($recentInteractions as $interaction)
                <li class="list-group-item">
                    <strong>{{__('dash.Name') }}: </strong> {{ $interaction->customer->name }} 
                    <div></div>
                    <strong>{{__('dash.Notes') }}: </strong>{{ $interaction->notes }} 
                    <div></div>
                    <span class="text-muted">({{ $interaction->created_at->format('d M Y') }})</span>
                </li>
            @endforeach
        </ul>
    </div>
    
</x-app-layout>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}
     <!-- Customer Management Card -->
     {{-- <div class="mt-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
            <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200">
                {{ __('Customer Management') }}
            </h3>
            <p class="text-gray-700 dark:text-gray-300 mt-2">
                Manage customer information  details.
            </p>
            <a href="{{ route('customers.index') }}" class="btn btn-info" style="width: 300px; height: 40px;">
                Go to Customer Management
            </a>
            {{-- <a href="{{ route('tickets.index') }}" class="mt-4 inline-block bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">
                Go to Ticket Management
            </a> --}}
        {{-- </div>
        <div class="p-6">
            <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200">
                {{ __('Ticket Management') }}
            </h3>
            <p class="text-gray-700 dark:text-gray-300 mt-2">
                Manage ticket information details.
            </p>
            <a href="{{ route('tickets.index') }}" class="btn btn-primary" style="width: 300px; height: 40px;">
                Go to Ticket Management
            </a>           
        </div>
    </div>
    <!-- End of Customer Management Card -->
</div>  --}}

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('ticketStatusChart').getContext('2d');
    var ticketStatusChart = new Chart(ctx, {
        type: 'pie', // or 'bar', 'doughnut' as preferred
        data: {
            labels: {!! json_encode($ticketStatuses->keys()) !!},
            datasets: [{
                label: 'Ticket Statuses',
                data: {!! json_encode($ticketStatuses->values()) !!},
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'], // Add more colors if needed
            }]
        },
    });
</script>
@endsection
