<!DOCTYPE html>
<html>
<head>
    <title>Payment Successful</title>
</head>
<body>
    <h1>Thank you for your payment!</h1>
    <p>Hi {{ $paymentDetails['name'] }},</p>
    <p>Your payment of ${{ number_format($paymentDetails['amount'] / 100, 2) }} has been successfully processed.</p>
    <p>Transaction ID: {{ $paymentDetails['transaction_id'] }}</p>
    <p>Thank you for your business!</p>
</body>
</html>
