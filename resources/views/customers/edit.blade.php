<x-app-layout>

        <!-- Include this where you want the success message to appear -->

    <div class="container-fluid" style="max-width: 1000px; margin: 0 auto;">
        <div class="container d-flex align-items-center justify-content-center mt-3" >
            <div>
                <strong><h5>Edit Customer</h5></strong>
            </div>
        </div>

        <form action="{{ route('customers.update', $customer) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $customer->name }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $customer->email }}" required>
            </div>
            <div class="mb-3">
                <label for="id_number" class="form-label">ID Number</label>
                <input type="text" name="id_number" id="id_number" class="form-control" value="{{ $customer->id_number }}" required>
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ $customer->phone_number }}" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea name="address" id="address" class="form-control" rows="3" required>{{ $customer->address }}</textarea>
            </div>
            <div class="mb-3">
                <label for="notes" class="form-label">Notes</label>
                <textarea name="notes" id="notes" class="form-control" rows="3">{{ $customer->notes }}</textarea>
            </div>
            @if (session('success'))
                <div id="success-message" class="alert alert-success" style="display: none;">
                    {{ session('success') }}
                </div>
            @endif

            @can('update', $customer)
            <button type="submit" class="btn btn-primary">Update Customer</button>
            @endcan

            <div class="d-flex justify-content-center mt-5">
            <a href="{{ route('customers.index') }}"  class="btn btn-outline-primary">
                <i class="bi bi-arrow-return-left"></i> Return
            </a>
            </div>
            
        </form>
    </div>

</x-app-layout>