<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Quote #{{ $quote->id }} - MoversLaredo</title>
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
        .quote-details {
            background-color: white;
            padding: 15px;
            margin: 15px 0;
            border-radius: 5px;
            border-left: 4px solid #007bff;
        }
        .footer {
            background-color: #2c3e50;
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 0 0 5px 5px;
        }
        .highlight {
            color: #007bff;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Movers Laredo</h1>
        <p>Professional Moving Services</p>
    </div>

    <div class="content">
        <h2>Dear {{ $quote->name }},</h2>

        <p>Thank you for requesting a moving quote with MoversLaredo. We have attached your detailed quote as a PDF document.</p>

        <div class="quote-details">
            <h3>Quote Summary</h3>
            <p><strong>Quote Number:</strong> #{{ $quote->id }}</p>
            <p><strong>Move Date:</strong> {{ $quote->move_date->format('F d, Y') }}</p>
            <p><strong>From:</strong> {{ $quote->from_address }}</p>
            <p><strong>To:</strong> {{ $quote->to_address }}</p>
            @if($quote->move_type)
            <p><strong>Move Type:</strong> {{ $quote->move_type }}</p>
            @endif
            @if($quote->quoted_amount)
            <p><strong>Estimated Cost:</strong> <span class="highlight">${{ number_format($quote->quoted_amount, 2) }}</span></p>
            @endif
        </div>

        <p>Please find the complete quote details in the attached PDF. If you have any questions or would like to proceed with your move, please don't hesitate to contact us.</p>

        <p><strong>Next Steps:</strong></p>
        <ul>
            <li>Review the attached quote document</li>
            <li>Contact us to confirm your booking</li>
            <li>We'll schedule your move and provide all necessary details</li>
        </ul>

        <p>We look forward to helping you with your move!</p>

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
