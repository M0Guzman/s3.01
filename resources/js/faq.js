const listquestion = document.querySelectorAll('.lien-section');
const listsection = document.querySelectorAll('.container_question')

// Ajouter un événement de clic à chaque <li>
listquestion.forEach(question => {
    question.addEventListener('click', function() {


        const divID = this.getAttribute('id-section');
        const divToShow = document.getElementById(divID); // Sélectionner la div correspondante à cet ID

        listsection.forEach(element => {
            element.style.display = 'none';
        });

        // Si la div existe, la rendre visible
        if (divToShow) {

            divToShow.style.display = 'block'; // Afficher la div
            divToShow.scrollIntoView({ behavior: 'smooth' });
        }
    });
});