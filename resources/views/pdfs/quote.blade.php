<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Quote #{{ $quote->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.4;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #2c3e50;
            padding-bottom: 20px;
        }
        .company-name {
            font-size: 28px;
            font-weight: bold;
            color: #2c3e50;
            margin: 0;
        }
        .company-info {
            font-size: 12px;
            color: #666;
            margin: 5px 0;
        }
        .quote-title {
            font-size: 20px;
            color: #007bff;
            margin: 20px 0 10px 0;
        }
        .section {
            margin: 20px 0;
        }
        .section-title {
            font-size: 16px;
            font-weight: bold;
            color: #2c3e50;
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }
        .info-row {
            display: flex;
            margin: 8px 0;
        }
        .info-label {
            font-weight: bold;
            width: 150px;
            display: inline-block;
        }
        .info-value {
            flex: 1;
        }
        .price-section {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .total-amount {
            font-size: 20px;
            font-weight: bold;
            color: #007bff;
            text-align: center;
            margin: 10px 0;
        }
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #dee2e6;
            font-size: 11px;
            color: #666;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        .info-table td {
            padding: 8px 0;
            vertical-align: top;
        }
        .info-table .label {
            font-weight: bold;
            width: 150px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1 class="company-name">Movers Laredo</h1>
        <div class="company-info">Professional Moving Services</div>
        <div class="company-info">602 W. Calton RD, Laredo, TX 78041 | Phone: (956) 526-8221 | Email: quote@moverslaredo.com</div>
        <h2 class="quote-title">MOVING QUOTE #{{ $quote->id }}</h2>
    </div>

    <div class="section">
        <div class="section-title">Customer Information</div>
        <table class="info-table">
            <tr>
                <td class="label">Name:</td>
                <td>{{ $quote->name }}</td>
            </tr>
            <tr>
                <td class="label">Email:</td>
                <td>{{ $quote->email }}</td>
            </tr>
            <tr>
                <td class="label">Phone:</td>
                <td>{{ $quote->phone }}</td>
            </tr>
            <tr>
                <td class="label">Quote Date:</td>
                <td>{{ $quote->created_at->format('F d, Y') }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Move Details</div>
        <table class="info-table">
            <tr>
                <td class="label">Move Date:</td>
                <td>{{ $quote->move_date->format('F d, Y') }}</td>
            </tr>
            <tr>
                <td class="label">Move Type:</td>
                <td>{{ $quote->move_type ?? 'Not specified' }}</td>
            </tr>
            <tr>
                <td class="label">Moving From:</td>
                <td>{{ $quote->from_address }}</td>
            </tr>
            <tr>
                <td class="label">Moving To:</td>
                <td>{{ $quote->to_address }}</td>
            </tr>
        </table>
    </div>

    @if($quote->message)
    <div class="section">
        <div class="section-title">Additional Details</div>
        <p>{{ $quote->message }}</p>
    </div>
    @endif

    @if($quote->quoted_amount)
    <div class="price-section">
        <div class="section-title">Estimated Cost</div>
        <div class="total-amount">${{ number_format($quote->quoted_amount, 2) }}</div>
        <p style="text-align: center; font-size: 12px; color: #666; margin: 5px 0;">
            *This is an estimate. Final pricing may vary based on actual services required.
        </p>
    </div>
    @endif

    <div class="section">
        <div class="section-title">Services Included</div>
        <ul style="margin: 10px 0; padding-left: 20px;">
            <li>Professional moving crew</li>
            <li>Loading and unloading</li>
            <li>Transportation between locations</li>
            <li>Basic moving equipment (dollies, straps, blankets)</li>
            <li>Disassembly and reassembly of basic furniture (as needed)</li>
        </ul>
    </div>

    <div class="section">
        <div class="section-title">Terms and Conditions</div>
        <ul style="font-size: 11px; margin: 10px 0; padding-left: 20px;">
            <li>This quote is valid for 30 days from the date issued.</li>
            <li>Final pricing may vary based on actual items to be moved and services required.</li>
            <li>A deposit may be required to secure your moving date.</li>
            <li>Please contact us to confirm your booking and finalize details.</li>
            <li>We are fully licensed and insured for your protection.</li>
        </ul>
    </div>

    <div class="footer">
        <p><strong>Thank you for choosing MoversLaredo!</strong></p>
        <p>To proceed with your move or if you have any questions, please contact us at (956) 526-8221 or quote@moverslaredo.com</p>
        <p>Document generated on {{ now()->format('F d, Y \a\t g:i A') }}</p>
    </div>
</body>
</html>
