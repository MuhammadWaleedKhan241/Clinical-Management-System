<!DOCTYPE html>
<html>

<head>
    <title>Invoice List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h1>Invoice List</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Patient Name</th>
                <th>Patient Email</th>
                <th>Patient Phone</th>
                <th>Amount</th>
                <th>Invoice Date</th>
                <th>Due Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
            <tr>
                <td>{{ $invoice->id }}</td>
                <td>{{ $invoice->patient_name }}</td>
                <td>{{ $invoice->patient_email }}</td>
                <td>{{ $invoice->patient_phone }}</td>
                <td>{{ $invoice->amount }}</td>
                <td>{{ $invoice->invoice_date }}</td>
                <td>{{ $invoice->due_date }}</td>
                <td>{{ ucfirst($invoice->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>