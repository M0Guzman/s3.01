<!DOCTYPE html>
<html>
<head>
    <title>Commande - En cours de livraison</title>
</head>
<body>
    <h1>Bonjour {{ $order->user->first_name }},</h1>
    <p>Votre commande a changé d'état à "En cours de livraison".</p>
    <p>Merci de votre commande!</p>
</body>
</html>
