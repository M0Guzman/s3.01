<!DOCTYPE html>
<html>
<head>
    <title>Commande - Annuler</title>
</head>
<body>
    <h1>Bonjour {{ $order->user->first_name }},</h1> 
    <p>Votre commande a changé d'état en "Annulée".</p>
    <p>Voici donc un bon de réduction : {{ $order->coupon->code }}.</p>
    <p>Merci pour votre commande !</p>

</body>
</html>
