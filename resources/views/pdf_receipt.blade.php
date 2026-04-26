<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Receipt - {{ $order->transaction_id }}</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            color: #333;
            line-height: 1.6;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: auto;
            border: 1px solid #eee;
            padding: 30px;
            border-radius: 10px;
        }
        .header {
            text-align: center;
            margin-bottom: 40px;
            border-bottom: 2px solid #0077be;
            padding-bottom: 20px;
        }
        .header h1 {
            color: #0077be;
            margin: 0;
            font-size: 32px;
        }
        .header p {
            color: #777;
            margin: 5px 0 0;
        }
        .details {
            margin-bottom: 40px;
        }
        .details table {
            width: 100%;
            border-collapse: collapse;
        }
        .details td {
            padding: 10px 0;
        }
        .details .label {
            color: #999;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .details .value {
            font-weight: bold;
            font-size: 16px;
        }
        .qr-section {
            text-align: center;
            margin-bottom: 40px;
            background: #f0f9ff;
            padding: 20px;
            border-radius: 10px;
        }
        .qr-section p {
            font-family: monospace;
            color: #0077be;
            margin-top: 10px;
            font-size: 12px;
        }
        .total-box {
            background: #0077be;
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
        .total-box .total-label {
            font-size: 14px;
            margin-bottom: 5px;
        }
        .total-box .total-amount {
            font-size: 28px;
            font-weight: bold;
        }
        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 12px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>VioWater2</h1>
            <p>Official Digital Receipt</p>
        </div>

        <div class="details">
            <table>
                <tr>
                    <td>
                        <div class="label">Date</div>
                        <div class="value">{{ $order->created_at->format('d M Y, H:i') }}</div>
                    </td>
                    <td style="text-align: right;">
                        <div class="label">Transaction ID</div>
                        <div class="value">{{ $order->transaction_id }}</div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-top: 20px;">
                        <div class="label">Customer Name</div>
                        <div class="value">{{ $order->customer_name }}</div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-top: 20px;">
                        <div class="label">Delivery Address</div>
                        <div class="value">{{ $order->address }}</div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-top: 20px;">
                        <div class="label">Order Type</div>
                        <div class="value">{{ $order->order_type == 'refill' ? 'Refill Water (5L/19L)' : 'Empty Gallon Purchase' }}</div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="qr-section">
            <!-- For PDF, we use a simple text or a public QR generator URL since dompdf can be picky with local SVG -->
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ $order->transaction_id }}" alt="QR Code" width="120">
            <p>{{ $order->transaction_id }}</p>
        </div>

        <div class="total-box">
            <div class="total-label">Total Amount Paid</div>
            <div class="total-amount">Rp {{ number_format($order->total_price, 0, ',', '.') }}</div>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} VioWater2. Thank you for your purchase!<br>
            This is a computer-generated receipt and does not require a signature.
        </div>
    </div>
</body>
</html>
