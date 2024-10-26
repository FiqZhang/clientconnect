<x-app-layout>
<div class="container">
    <div class="container d-flex align-items-center justify-content-center mt-3" >
        <div>
            <h5>Ticket Management</h5>
        </div>
    </div>

    <div class="container d-flex align-items-center justify-content-center mt-3 mb-3">
        <a href="{{ route('tickets.create') }}" class="btn btn-primary me-2">Create Ticket</a>
        <a href="{{ request()->fullUrlWithQuery(['generate-excel' => true]) }}" class="btn btn-primary">Generate Excel</a>
    </div>
    <form action="{{ route('tickets.index') }}" method="GET" class="mb-4">
        <div class="col">
            <select name="status" class="form-control" onchange="this.form.submit()">
                <option value="">All Status</option>
                <option value="open" {{ request('status') == 'open' ? 'selected' : '' }}>Open</option>
                <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="resolved" {{ request('status') == 'resolved' ? 'selected' : '' }}>Resolved</option>
                <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Closed</option>
            </select>
        </div>
    </form>
    {{-- <form action="{{ route('tickets.index') }}" method="GET" class="mb-4">
    <label class="font-weight-bold" for="">Bulan</label>
            <div class="form-group col-md-2">
                <select class="form-control" name="bulan" onchange="window.document.filter.submit();">
                    <option value="" selected> Pilih </option>
                    @foreach ($senaraiBulan as $bulan)
                        <option value="{{ $bulan->format('m') }}" {{ $bulan->format('m') == (request()->query('bulan')) ? 'selected' : '' }}>
                            {{ mb_strtoupper($bulan->locale('ms')->translatedFormat('F')) }}
                        </option>
                    @endforeach
                </select>
            </div>
    </form> --}}

   
    
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Status</th>
                <th>Priority</th>
                <th>Customer</th>
                <th>Assigned To</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->title }}</td>
                    <td>{{ ucfirst($ticket->status) }}</td>
                    <td>{{ ucfirst($ticket->priority) }}</td>
                    <td>{{ $ticket->customer->name }}</td>
                    <td>{{ $ticket->assignedUser ? $ticket->assignedUser->name : 'Unassigned' }}</td>
                    <td>
                        <a href="{{ route('tickets.edit', $ticket) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('tickets.destroy', $ticket) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $tickets->links() }} 
</x-app-layout>