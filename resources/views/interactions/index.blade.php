<x-app-layout>
    <div class="container">
        <h1>Interactions for {{ $customer->name }}</h1>
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