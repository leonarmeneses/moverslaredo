<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice {{ $invoice->invoice_number }} - MoversLaredo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            background-color: #f8f9fa;
            padding: 20px;
            border: 1px solid #dee2e6;
        }
        .invoice-details {
            background-color: white;
            padding: 15px;
            margin: 15px 0;
            border-radius: 5px;
            border-left: 4px solid #28a745;
        }
        .footer {
            background-color: #2c3e50;
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 0 0 5px 5px;
        }
        .highlight {
            color: #28a745;
            font-weight: bold;
        }
        .status-badge {
            padding: 5px 10px;
            border-radius: 3px;
            color: white;
            font-size: 12px;
            text-transform: uppercase;
        }
        .status-paid { background-color: #28a745; }
        .status-sent { background-color: #17a2b8; }
        .status-draft { background-color: #ffc107; color: #333; }
        .status-overdue { background-color: #dc3545; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Movers Laredo</h1>
        <p>Professional Moving Services</p>
    </div>

    <div class="content">
        <h2>Dear {{ $invoice->customer_name }},</h2>

        @if($invoice->status === 'paid')
        <p>Thank you for your payment! Please find your paid invoice attached as a PDF document.</p>
        @else
        <p>Please find your invoice attached as a PDF document. We appreciate your business with MoversLaredo.</p>
        @endif

        <div class="invoice-details">
            <h3>Invoice Summary</h3>
            <p><strong>Invoice Number:</strong> {{ $invoice->invoice_number }}</p>
            <p><strong>Invoice Date:</strong> {{ $invoice->invoice_date->format('F d, Y') }}</p>
            <p><strong>Due Date:</strong> {{ $invoice->due_date->format('F d, Y') }}</p>
            <p><strong>Status:</strong>
                <span class="status-badge status-{{ $invoice->status }}">
                    {{ ucfirst($invoice->status) }}
                </span>
            </p>
            <p><strong>Total Amount:</strong> <span class="highlight">${{ number_format($invoice->total_amount, 2) }}</span></p>
            @if($invoice->paid_at)
            <p><strong>Paid On:</strong> {{ $invoice->paid_at->format('F d, Y \a\t g:i A') }}</p>
            @endif
        </div>

        @if($invoice->status !== 'paid')
        <p><strong>Payment Information:</strong></p>
        <p>Please remit payment by the due date shown above. You can contact us to arrange payment or if you have any questions about this invoice.</p>
        @endif

        <p>The attached PDF contains complete details of the services provided and charges.</p>

        @if($invoice->notes)
        <div style="background-color: #e9ecef; padding: 15px; border-radius: 5px; margin: 15px 0;">
            <strong>Additional Notes:</strong><br>
            {{ $invoice->notes }}
        </div>
        @endif

        <p>Thank you for choosing MoversLaredo for your moving needs!</p>

        <p>Best regards,<br>
        <strong>MoversLaredo Team</strong></p>
    </div>

    <div class="footer">
        <p><strong>Contact Information:</strong></p>
        <p>Phone: (956) 526-8221 | Email: quote@moverslaredo.com</p>
        <p>602 W. Calton RD, Laredo, TX 78041 | Professional Moving Services</p>
    </div>
</body>
</html>
