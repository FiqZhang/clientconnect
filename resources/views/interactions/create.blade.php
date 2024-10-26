<x-app-layout>
    <div class="container">
        <h1>Add Interaction for {{ $customer->name }}</h1>
        <form action="{{ route('customers.interactions.store', $customer) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="interaction_date" class="form-label">Date</label>
                <input type="date" name="interaction_date" id="interaction_date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select name="type" id="type" class="form-control" required>
                    <option value="">Select Interaction Type</option>
                    <option value="email">Email</option>
                    <option value="phone_call">Phone Call</option>
                    <option value="meeting">Meeting</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="notes" class="form-label">Notes</label>
                <textarea name="notes" id="notes" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Interaction</button>
        </form>
    </div>
</x-app-layout>