<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice {{ $invoice->invoice_number }}</title>
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
        .invoice-title {
            font-size: 24px;
            color: #28a745;
            margin: 20px 0 10px 0;
        }
        .invoice-info {
            float: right;
            text-align: right;
            margin-bottom: 20px;
        }
        .customer-info {
            float: left;
            margin-bottom: 20px;
        }
        .clear {
            clear: both;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }
        .info-table td {
            padding: 8px 0;
            vertical-align: top;
        }
        .info-table .label {
            font-weight: bold;
            width: 120px;
        }
        .invoice-table {
            border: 1px solid #dee2e6;
        }
        .invoice-table th,
        .invoice-table td {
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: left;
        }
        .invoice-table th {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        .invoice-table .amount {
            text-align: right;
            white-space: nowrap;
        }
        .total-row {
            background-color: #2c3e50;
            color: white;
            font-weight: bold;
        }
        .status-badge {
            padding: 5px 10px;
            border-radius: 3px;
            color: white;
            font-size: 12px;
            text-transform: uppercase;
            display: inline-block;
        }
        .status-paid { background-color: #28a745; }
        .status-sent { background-color: #17a2b8; }
        .status-draft { background-color: #ffc107; color: #333; }
        .status-overdue { background-color: #dc3545; }
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #dee2e6;
            font-size: 11px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1 class="company-name">Movers Laredo</h1>
        <div class="company-info">Professional Moving Services</div>
        <div class="company-info">602 W. Calton RD, Laredo, TX 78041 | Phone: (956) 526-8221 | Email: quote@moverslaredo.com</div>
        <h2 class="invoice-title">INVOICE</h2>
    </div>

    <div class="invoice-info">
        <table class="info-table">
            <tr>
                <td class="label">Invoice #:</td>
                <td>{{ $invoice->invoice_number }}</td>
            </tr>
            <tr>
                <td class="label">Date:</td>
                <td>{{ $invoice->invoice_date->format('F d, Y') }}</td>
            </tr>
            <tr>
                <td class="label">Due Date:</td>
                <td>{{ $invoice->due_date->format('F d, Y') }}</td>
            </tr>
            <tr>
                <td class="label">Status:</td>
                <td>
                    <span class="status-badge status-{{ $invoice->status }}">
                        {{ ucfirst($invoice->status) }}
                    </span>
                </td>
            </tr>
        </table>
    </div>

    <div class="customer-info">
        <div class="section-title">Bill To:</div>
        <table class="info-table">
            <tr>
                <td><strong>{{ $invoice->customer_name }}</strong></td>
            </tr>
            <tr>
                <td>{{ $invoice->customer_email }}</td>
            </tr>
            <tr>
                <td>{{ $invoice->customer_phone }}</td>
            </tr>
        </table>
    </div>

    <div class="clear"></div>

    <div class="section">
        <div class="section-title">Service Description</div>
        <p>{{ $invoice->service_description }}</p>
    </div>

    <table class="invoice-table">
        <thead>
            <tr>
                <th>Description</th>
                <th style="width: 120px; text-align: right;">Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Moving Services</td>
                <td class="amount">${{ number_format($invoice->subtotal, 2) }}</td>
            </tr>
            @if($invoice->tax_amount > 0)
            <tr>
                <td>Tax ({{ number_format($invoice->tax_rate, 2) }}%)</td>
                <td class="amount">${{ number_format($invoice->tax_amount, 2) }}</td>
            </tr>
            @endif
        </tbody>
        <tfoot>
            <tr class="total-row">
                <td><strong>TOTAL</strong></td>
                <td class="amount"><strong>${{ number_format($invoice->total_amount, 2) }}</strong></td>
            </tr>
        </tfoot>
    </table>

    @if($invoice->paid_at)
    <div style="background-color: #d4edda; border: 1px solid #c3e6cb; border-radius: 5px; padding: 15px; margin: 20px 0; color: #155724;">
        <strong>✓ PAID</strong> - Payment received on {{ $invoice->paid_at->format('F d, Y \a\t g:i A') }}
    </div>
    @else
    <div style="background-color: #fff3cd; border: 1px solid #ffeaa7; border-radius: 5px; padding: 15px; margin: 20px 0; color: #856404;">
        <strong>Payment Due:</strong> {{ $invoice->due_date->format('F d, Y') }}
    </div>
    @endif

    @if($invoice->notes)
    <div class="section">
        <div class="section-title">Notes</div>
        <p>{{ $invoice->notes }}</p>
    </div>
    @endif

    <div class="section">
        <div class="section-title">Payment Information</div>
        <p style="font-size: 12px;">
            Please contact us at (956) 526-8221 or quote@moverslaredo.com to arrange payment or if you have any questions about this invoice.
        </p>
    </div>

    <div class="footer">
        <p><strong>Thank you for your business!</strong></p>
        <p>MoversLaredo - Professional Moving Services | Licensed & Insured</p>
        <p>Document generated on {{ now()->format('F d, Y \a\t g:i A') }}</p>
    </div>
</body>
</html>
