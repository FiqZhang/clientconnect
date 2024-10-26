<x-app-layout>
<div class="container">
    <h1>Ticket Details</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $ticket->title }}</h5>
            <p class="card-text">{{ $ticket->description }}</p>
            <p><strong>Status:</strong> {{ ucfirst($ticket->status) }}</p>
            <p><strong>Priority:</strong> {{ ucfirst($ticket->priority) }}</p>
            <p><strong>Customer:</strong> {{ $ticket->customer->name }}</p>
            <p><strong>Assigned To:</strong> {{ $ticket->assignedUser ? $ticket->assignedUser->name : 'Unassigned' }}</p>
            <p><strong>Created At:</strong> {{ $ticket->created_at->format('d-m-Y H:i') }}</p>
            <a href="{{ route('tickets.edit', $ticket) }}" class="btn btn-warning">Edit Ticket</a>
        </div>
    </div>
</div>
</x-app-layout>