<form action="{{ route('reports.customers') }}" method="GET">
    <label for="start_date">Start Date:</label>
    <input type="date" name="start_date" id="start_date">
    
    <label for="end_date">End Date:</label>
    <input type="date" name="end_date" id="end_date">

    <button type="submit">Filter</button>
</form>

<a href="{{ route('reports.download.customers.csv') }}">Download CSV</a>
<a href="{{ route('reports.download.customers.pdf') }}">Download PDF</a>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <!-- Add more columns as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
        <tr>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->address }}</td>
            <!-- Add more columns as needed -->
        </tr>
        @endforeach
    </tbody>
</table>
