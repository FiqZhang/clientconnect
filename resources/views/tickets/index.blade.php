<x-app-layout>
<div class="container">
    <div class="container d-flex align-items-center justify-content-center mt-3" >
        <div>
            <h5>Ticket Management</h5>
        </div>
    </div>
    <div class="container d-flex align-items-center justify-content-center mt-3 mb-3"><a href="{{ route('tickets.create') }}" class="btn btn-primary">Create Ticket</a></div>
    
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
</x-app-layout>