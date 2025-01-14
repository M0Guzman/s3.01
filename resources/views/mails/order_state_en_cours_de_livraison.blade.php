<!DOCTYPE html>
<html>
<head>
    <title>Commande - En cours de livraison</title>
</head>
<body>
    <h1>Bonjour {{ $order->user->first_name }},</h1>
    <p>Votre commande a changé d'état pour "En cours de livraison".</p>
    <p>Veuillez finaliser le paiement de la commande.</p>
    <p>Merci.</p>

</body>
</html>
