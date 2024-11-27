
<x-app-layout>
    <div class="container-fluid" style="max-width: 1400px; margin: 0 auto;">
     
        
        <div class="container d-flex align-items-center justify-content-center mt-3" >
            <div>
                <h5>Customer Management</h5>
            </div>
        </div>
        <div class="container d-flex align-items-center justify-content-center mt-3 mb-3">
            @can('create',  App\Models\Customer::class)
            <a href="{{ route('customers.create') }}" class="btn btn-primary me-2">Add Customer</a>
            @endcan
            <a href="{{ request()->fullUrlWithQuery(['generate-pdf' => true]) }}" class="btn btn-primary">Generate PDF</a>
        </div>

        <form action="{{ route('customers.index') }}">
        <div class="row mb-3">
            <div class="d-flex align-items-center justify-content-center mt-3 mb-3">
                <input type="text" name="search" class="form-control" placeholder="Search by Name" value="{{ request('search') }}">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="w-5">ID Number</th> 
                    <th scope="col" class="w-105">Name</th>
                    <th scope="col" class="w-10">Email</th> <!-- Increased width -->  
                    <th scope="col" class="w-10">Phone Number</th>
                    <th scope="col" class="w-25">Address</th> <!-- Set width instead of flex-fill -->
                    <th scope="col" class="w-13">Notes</th>
                    <th scope="col" class="w-22">Action</th> 
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->id_number }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>   
                        <td>{{ $customer->phone_number }}</td>
                        <td >{{ $customer->address }}</td>
                        <td>{{ $customer->notes }}</td>
                        <td>
                            <a href="{{ route('customers.edit', $customer) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('customers.destroy', $customer) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                @can('delete', $customer)
                                <button type="submit" class="btn btn-danger btn-sm mt-1 mb-1">Delete</button>
                                @endcan
                            </form>
                            <a href="{{ route('customers.interactions.index', $customer) }}" class="btn btn-secondary btn-sm ">Interaction<br>Tracking</a>
                        </td>                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
      
    <div class="container">
        <div class="row justify-content-center ">
          <div class="col-3">
            <div class="p-3 border bg-light">{{ $customers->links('pagination::bootstrap-5') }}</div>
          </div>
        </div>
      </div>

</x-app-layout>
