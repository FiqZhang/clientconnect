<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h1 class="text-center">Hello, {{ $name }}!</h1>
        </div>
        <div class="card-body">
            <p class="lead">Thank you for submitting the form.</p>
            <h5>Details:</h5>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Title:</strong>
                    <span>{{ $data['title'] }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Description:</strong>
                    <span>{{ $data['description'] }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Priority:</strong>
                    <span>{{ $data['priority'] }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Assigned To:</strong>
                    <span>{{ $assignedName }}</span>
                </li>
            </ul>
        </div>
      
    </div>
</div>
