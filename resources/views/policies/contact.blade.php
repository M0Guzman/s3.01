<x-app-layout>

<div id="section">

    <p>
        Pour contacter notre support,<br>
        vous pouvez nous appeler au <strong>07 66 69 71 18</strong> <br>
        ou nous envoyer un email à <strong>Contact@vinotrip.fr</strong>.<br><br>

        Pour exercer vos droits sur les données personnelles, contactez notre DPO par email à <strong>thomas.betrix@etu.univ-smb.fr</strong><br><br>

        <a class="lien" href="{{ route('policies.terms') }}">En savoir plus sur notre politique de vente</a><br>
        <a class="lien" href="{{ route('policies.cookies') }}">En savoir plus sur notre politique de cookies</a><br>
        <a class="lien" href="{{ route('policies.privacy') }}">En savoir plus sur notre politique de confidencialité</a>
    </p>

</div>

<style>

    #section {
        padding: 20px;
    }

    .lien {
        color: #3597ff;    
        font-size: 1em;  
    }
</style>

</x-app-layout>

