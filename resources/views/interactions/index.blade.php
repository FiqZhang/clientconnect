<x-app-layout>
    <div class="container">
        <div class="container d-flex align-items-center justify-content-center mt-3" >
            <div>
                <strong><h5>Interactions for {{ $customer->name }}</h5></strong>
            </div>
        </div>
        
        <a href="{{ route('customers.interactions.create', $customer) }}" class="btn btn-primary mb-3">Add Interaction</a>

        <ul class="list-group">
            @foreach ($interactions as $interaction)
                <li class="list-group-item">
                    <strong>{{ $interaction->interaction_date }}</strong> - {{ $interaction->type }}
                    <p>{{ $interaction->notes }}</p>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>