<!DOCTYPE html>
<html>
<head>
    <title>Changement d'état de commande</title>
</head>
<body>
    <h1>Bonjour {{ $order->user->first_name }},</h1>
    <p>Votre commande a changé d'état.</p>
    <p>Nouvel état : {{ $order->orderState->name }}</p>
    <p>Merci de votre commande !</p>
</body>
</html>
