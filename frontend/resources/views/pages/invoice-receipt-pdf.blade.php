<!DOCTYPE html>
<html>
<head>
    <title>INVOICE RECEIPT</title>
</head>
<body style="font-family: Arial, sans-serif;">
    <div style="text-align: center; margin-bottom: 20px;">
        <img src="https://i.imgur.com/gsK52UO.png" alt="Company Logo" style="max-width: 150px;">
    </div>

    <h1 style="text-align: center;">INVOICE RECEIPT</h1>
    <div>
        <div>
            <p><strong>Invoice Number:</strong> {{ $invoice->invoice_id }}</p>
        </div>
    </div>

    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border: 1px solid #000; padding: 8px; background-color: #f2f2f2;">Product Name</th>
                <th style="border: 1px solid #000; padding: 8px; background-color: #f2f2f2;">Quantity</th>
                <th style="border: 1px solid #000; padding: 8px; background-color: #f2f2f2;">Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $invoices as $inv)    
            <tr>
                <td style="border: 1px solid #000; padding: 8px;">{{ $inv->product_name }}</td>
                <td style="border: 1px solid #000; padding: 8px;">{{ $inv->num_of_items }}</td>
                <td style="border: 1px solid #000; padding: 8px;">{{ $inv->price }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <div>
            <p><strong>Total Amount:</strong> {{ $invoice->total }}</p>
            <p><strong>Cash:</strong> {{ $invoice->cash }}</p>
            <p><strong>Change:</strong> {{ $invoice->customer_change }}</p>
        </div>
    </div>
</body>
</html>
