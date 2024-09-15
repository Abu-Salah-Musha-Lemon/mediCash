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
            width: 90mm;
            margin: auto;
            padding: 10px;
        }
        .invoice-header, .invoice-body, .invoice-footer {
            margin-bottom: 10px;
        }
        .invoice-header {
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }
        .invoice-header img {
            width: 70px;
            height: 70px;
        }
        .billing-info, .order-details {
            margin-bottom: 10px;
        }
        .billing-info p, .order-details p {
            margin: 0;
            padding: 0;
        }
        .invoice-body table {
            width: 100%;
            border-collapse: collapse;
        }
        .invoice-body th, .invoice-body td {
            border: 1px solid #ddd;
            padding: 5px;
        }
        .invoice-body th {
            background-color: #f4f4f4;
        }
        .text-right {
            text-align: right;
        }
        .text-left {
            text-align: left;
        }
        .invoice-footer {
            text-align: center;
            font-size: 12px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="invoice-header">
            <table>
                <tr>
                    <td style="width: 50%;">
                        <div class="billing-info">
                            <img src="{{public_path('images/logo/medicash.png')}}" alt="MediCashLogo">
                            <p>Hello, Stock Genie.</p>
                            <b>BILLING INFORMATION</b>
                            <p>
                                ASML Ltd.<br>
                                312 Madison Ave.<br>
                                Dhaka - 1204<br>
                                Bangladesh
                            </p>
                        </div>
                    </td>
                    <td style="width: 50%;  text-align: right;">
                        <div class="order-details">
                            <h4>Invoice</h4>
                            <h5>ORDER #{{ $order->id }}</h5>
                            <?php
                            // Original date string
                            $order_date = $order->order_date;

                            // Create a DateTime object from the original date string
                            $date = DateTime::createFromFormat('d-m-y', $order_date);

                            // Format the date to the desired output
                            $formatted_date = $date->format(' F d Y');
                            ?>
                            <p>{{$formatted_date }}</p>

                            <b>PAYMENT INFORMATION</b>
                            <p>{{$order->payment_status}}</p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="invoice-body">
            <table>
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Unit Cost</th>
                        <th class="text-left">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php $sl=1; @endphp
                    @foreach($orderDetails as $row)
                    <tr class="text-center">
                        <td>{{$sl++}}</td>
                        <td>{{$row->product_name}}</td>
                        <td>{{$row->quantity}}</td>
                        <td>{{$row->unitCost}}</td>
                        <td class="text-left">
                            {{$row->quantity * $row->unitCost}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-right"><strong>SUBTOTAL</strong></td>
                        <td class="text-left">{{$order->sub_total}}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right"><strong>Qty</strong></td>
                        <td class="text-left">{{$order->total_products}}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right"><strong>TAX (21%)</strong></td>
                        <td class="text-left">{{$order->vat}}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right"><strong>Grand TOTAL</strong></td>
                        <td class="text-left"><strong>{{$order->total}}</strong></td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right">Payment</td>
                        <td class="text-left">{{$order->pay}}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right">Due</td>
                        <td class="text-left">{{$order->due}}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right"><strong>Change Amount</strong></td>
                        <td class="text-left"><strong>{{$order->returnAmount}}</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="invoice-footer">
            Thank you for your order.
        </div>
    </div>
</body>
</html>