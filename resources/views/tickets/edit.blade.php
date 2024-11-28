<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-xxxxxxxxxxxxxxxxxxxxxxxxxxxxx" crossorigin="anonymous">
    
    <div class="container-fluid" style="max-width: 1000px; margin: 0 auto;">
        
        <div class="container d-flex align-items-center justify-content-center mt-3" >
            <div>
                <strong><h5>Edit Ticket</h5></strong>
            </div>
        </div>
        
        <form action="{{ route('tickets.update', $ticket) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3 mt-3">
                    <label for="customer_id" class="form-label">Customer</label>
                    <select name="customer_id" id="customer_id" class="form-select" required>
                        <option value="">Select Customer</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}" {{ $ticket->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $ticket->title }}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="4" required>{{ $ticket->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select" required>
                        <option value="open" {{ $ticket->status == 'open' ? 'selected' : '' }}>Open</option>
                        <option value="in progress" {{ $ticket->status == 'in progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="resolved" {{ $ticket->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                        <option value="closed" {{ $ticket->status == 'closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="priority" class="form-label">Priority</label>
                    <select name="priority" id="priority" class="form-select" required>
                        <option value="low" {{ $ticket->priority == 'low' ? 'selected' : '' }}>Low</option>
                        <option value="medium" {{ $ticket->priority == 'medium' ? 'selected' : '' }}>Medium</option>
                        <option value="high" {{ $ticket->priority == 'high' ? 'selected' : '' }}>High</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="assigned_to" class="form-label">Assigned To</label>
                    <select name="assigned_to" id="assigned_to" class="form-select">
                        <option value="">Unassigned</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $ticket->assigned_to == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            <div class="container">
                <div class="row">
                        {{-- <div class="col-md-6">
                            <a href="{{ route('tickets.viewFile', $ticket->id) }}" target="_blank">View File</a>
                        </div> --}}
                        <div class="col-md-4"></div>
                        <div class="col-md-3">
                            <a style="color: #007bff; text-decoration: underline;" href="javascript:void(0)" onclick="openFilePopup('{{ route('tickets.viewFile', $ticket->id) }}')">View File</a>
                        </div>
                        <div class="col-md-4">
                            <a style="color: #007bff; text-decoration: underline;" href="{{ route('tickets.downloadFile', $ticket->id) }}" target="_blank">Download File</a>
                        </div>
                        <div class="col-md-1"></div>
                </div> 
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                    
                @if (session('success'))
                <div id="success-message" class="alert alert-success" style="display: none;">
                    {{ session('success') }}
                </div>
            @endif

            </div>
            <div class="d-flex justify-content-center mt-5">
                <button type="submit" class="btn btn-primary me-2">Update Ticket</button>
                <a href="{{ route('tickets.index') }}"  class="btn btn-outline-primary">
                    <i class="bi bi-arrow-return-left"></i> Return
                </a>
                
            </div>
        </form>
    </div>

    <script>
        function openFilePopup(url) {
            var popup = window.open(url, 'filePopup', 'width=800,height=600,resizable,scrollbars=yes');
            if (popup) {
                popup.focus();
            }
        }
    </script>

</x-app-layout>