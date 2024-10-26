<!DOCTYPE html>
<html lang="en">
<head>
    <style>

@page{
            /* size: landscape; */
            margin: 20mm;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 0.5px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            color: black;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        p, div, td {
        font-size:11px;
        }
        th,h5 {
        font-size:12px;
        }
        body {
        font-family: 'Times New Roman', Times, serif;
    }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body>

<div class="container-fluid">
    <h5 class="text-center">Customer Management</h5>

    <table class="table">
        <thead>
            <tr>
                <th>ID Number</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Notes</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->id_number }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone_number }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->notes }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
