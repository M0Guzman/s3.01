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



const listquestion = document.querySelectorAll('.onequestion');
const listdiv = document.querySelectorAll('.content');

const buttonBack = document.getElementById('buttonBack');
const home = document.getElementById('modal-body');

buttonBack.addEventListener('click', function() {
    listdiv.forEach(element => {
        element.style.display = 'none';
    });
    home.style.display = "flex";
})


// Ajouter un événement de clic à chaque <li>
listquestion.forEach(question => {
    question.addEventListener('click', function() {
        const divID = this.getAttribute('id-section-help');
        
        // Vérifier si l'attribut id-section existe et est valide
        if (!divID) return; // Si l'attribut id-section n'existe pas, on arrête l'exécution de la fonction
        
        const divToShow = document.getElementById(divID); // Sélectionner la div correspondante à cet ID

        // Masquer toutes les divs
        listdiv.forEach(element => {
            element.style.display = 'none';
        });

        // Si la div existe, la rendre visible
        if (divToShow) {
            divToShow.style.display = 'block';
        }
    });
});