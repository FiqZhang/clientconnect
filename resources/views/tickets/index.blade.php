<x-app-layout>
<div class="container">
    <div class="container d-flex align-items-center justify-content-center mt-3" >
        <div>
            <strong><h5>Ticket Management</h5></strong>
        </div>
    </div>

    <div class="container d-flex align-items-center justify-content-center mt-3 mb-3">
        <a href="{{ route('tickets.create') }}" class="btn btn-primary me-2">Create</a>
        <a href="{{ request()->fullUrlWithQuery(['generate-excel' => true]) }}"   class="btn btn-primary d-flex justify-content-center align-items-center me-2" style="width: 70px; height: 40px;"><img src="{{ asset('logo/xls.png') }}" alt="Icon" style="width: 30px; height: 30px;"></a>
        <a href="{{ route('management') }}"  class="btn btn-outline-primary">
            <i class="bi bi-arrow-return-left"></i> Return
        </a>
     
    </div>
    <div class="row mb-4">
        <div class="col-md-4">
            <form action="{{ route('tickets.index') }}" method="GET" class="mb-4">
                <div class="form-group">
                    <label class="font-weight-bold" for=""><strong>Status</strong></label>
                    <select name="status" class="form-control" onchange="this.form.submit()">
                        <option value="">All Status</option>
                        <option value="open" {{ request('status') == 'open' ? 'selected' : '' }}>Open</option>
                        <option value="in progress" {{ request('status') == 'in progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="resolved" {{ request('status') == 'resolved' ? 'selected' : '' }}>Resolved</option>
                        <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <form action="{{ route('tickets.index') }}" method="GET" class="mb-4">
            <label class="font-weight-bold" for=""><strong>Month</strong></label>
                    <div class="form-group">
                        <select class="form-control" name="bulan" onchange="this.form.submit()">
                            <option value="" selected> Pilih </option>
                            @foreach ($senaraiBulan as $bulan)
                                <option value="{{ $bulan->format('m') }}" {{ $bulan->format('m') == (request()->query('bulan')) ? 'selected' : '' }}>
                                    {{ mb_strtoupper($bulan->locale('ms')->translatedFormat('F')) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
            </form>
        </div>
    </div>
    
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
                            <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="container">
    <div class="row justify-content-center ">
      <div class="col-3">
        <div class="">{{ $tickets->links('pagination::bootstrap-5') }}</div>
      </div>
    </div>
</x-app-layout>