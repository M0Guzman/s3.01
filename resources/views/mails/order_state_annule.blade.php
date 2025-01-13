<!DOCTYPE html>
<html>
<head>
    <title>Commande - Annuler</title>
</head>
<body>
    <h1>Bonjour {{ $order->user->first_name }},</h1> 
    <p>Votre commande a changé d'état à "Annuler".</p>
    <p>Voici donc un bon de reduction {{ $order->coupon->code }} .</p>
    <p>Merci de votre commande!</p>
</body>
</html>
