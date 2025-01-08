const modal_aide = document.getElementById("modal_aide")
const Button_Aide = document.getElementById("Button_Aide")


Button_Aide.onclick = Open_Close_Modal;


function Open_Close_Modal() {
    if (modal_aide.classList.contains('hidden')) {
        modal_aide.classList.remove("hidden");
        Button_Aide.textContent = "X";
    }
    else {
        modal_aide.classList.add("hidden");
        Button_Aide.textContent = "?";
    }    
}
function afficherTexte(){

    var element = document.getElementById('Connexion');

    if (element.style.display === "none")
    {
        element.style.display = "block";
    }
    else
    {
        element.style.display = "none";
    }
}

document.addEventListener('DOMContentLoaded', () => {
    afficherTexte(elementId)
});
document.getElementById("Connexion").addEventListener('change', () => afficherTexte());
document.getElementById("Commande").addEventListener('change', () => afficherTexte());
document.getElementById("Reservation").addEventListener('change', () => afficherTexte());
document.getElementById("Support").addEventListener('change', () => afficherTexte());
document.getElementById("Accessibilité").addEventListener('change', () => afficherTexte());