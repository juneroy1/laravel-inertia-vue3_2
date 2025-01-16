<!DOCTYPE html>
<html>
<head>
    <title>Payment Reminder</title>
</head>
<body>
    <h1>Payment Reminder!</h1>
    <p>Hi {{ $paymentDetails['name'] }},</p>
    <p>Remindeer for your payment of ${{ number_format($paymentDetails['amount'] / 100, 2) }} due tomorrow.</p>
    <p>Transaction ID: {{ $paymentDetails['transaction_id'] }}</p>
    <p>Thank you for your business!</p>
</body>
</html>
