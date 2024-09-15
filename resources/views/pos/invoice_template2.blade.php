<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 12px;
            line-height: 1.2;
        }
        .container {
            width: 80mm; /* Common thermal printer width */
            margin: auto;
            padding: 5mm;
        }
        .invoice-header, .invoice-body, .invoice-footer {
            margin-bottom: 10px;
        }
        .invoice-header {
            border-bottom: 1px solid #000;
            padding-bottom: 5px;
        }
        .invoice-header img {
            width: 50px;
            height: auto;
            display: block;
            margin: auto;
        }
        .invoice-header h2, .invoice-header p {
            text-align: center;
            margin: 0;
        }
        .invoice-body table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Soft shadow effect */
        }
        .invoice-body th, .invoice-body td {
            border: 1px solid #000;
            padding: 3px;
            text-align: center;
        }
        .invoice-body th {
            background-color: #f0f0f0;
        }
        .invoice-body tfoot tr {
            border-top: 1px solid #000;
        }
        .text-left {
            text-align: left;
            padding-left: 5px;
        }
        .text-right {
            text-align: right;
            padding-right: 5px;
        }
        .invoice-footer {
            text-align: center;
            font-size: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Invoice Header -->
        <div class="invoice-header">
            <img src="{{public_path('images/logo/medicash.png')}}" alt="MediCash Logo">
            <h2>Stock Genie</h2>
            <p>ASML Ltd.</p>
            <p>312 Madison Ave.</p>
            <p>Dhaka - 1204</p>
            <p>Bangladesh</p>
        </div>

        <!-- Invoice Details -->
        <div class="invoice-body">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>Unit</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php $sl = 1; @endphp
                    @foreach($orderDetails as $row)
                    <tr>
                        <td>{{$sl++}}</td>
                        <td class="text-left">{{$row->product_name}}</td>
                        <td>{{$row->quantity}}</td>
                        <td>{{$row->unitCost}}</td>
                        <td>{{$row->quantity * $row->unitCost}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-right"><strong>SUBTOTAL</strong></td>
                        <td>{{$order->sub_total}}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right"><strong>TAX (21%)</strong></td>
                        <td>{{$order->vat}}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right"><strong>GRAND TOTAL</strong></td>
                        <td><strong>{{$order->total}}</strong></td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right"><strong>Payment</strong></td>
                        <td>{{$order->pay}}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right"><strong>Due</strong></td>
                        <td>{{$order->due}}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right"><strong>Change Amount</strong></td>
                        <td><strong>{{$order->returnAmount}}</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <!-- Invoice Footer -->
        <div class="invoice-footer">
            Thank you for your business!
        </div>
    </div>
</body>
</html>
