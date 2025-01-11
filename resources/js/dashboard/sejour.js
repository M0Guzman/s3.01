const TitreSejour = document.getElementById("TitreSejour");
const informationSejour = document.getElementById("informationSejour");

document.getElementById('ValiderForm').addEventListener('click', async function() {
        
    
    let housingsData = [];

    let elements = document.querySelectorAll('.select_domain');
    elements.forEach(dataOnehousing => {
        housingsData.push(
            parseInt(dataOnehousing.value, 10)
            
        )
    });


    let DomainData = [];

    elements = document.querySelectorAll('.select_domain');
    elements.forEach(dataOneDomain => {
        DomainData.push(
            parseInt(dataOneDomain.value, 10)
        )
    });

    let StepData = [];

    const fileToBase64 = async (file) =>
    new Promise((resolve, reject) => {
        const reader = new FileReader()
        reader.readAsDataURL(file)
        reader.onload = () => resolve(reader.result)
        reader.onerror = (e) => reject(e)
    })

    elements = document.querySelectorAll('.one_step_container');
    for(const dataOneStep of elements) {
        StepData.push({
            "image": await fileToBase64(dataOneStep.querySelector('.file-input').files[0]),
            "title": dataOneStep.querySelector('.descriptionStepText').value,
            "description": dataOneStep.querySelector('.titleStepText').value
        })
    };

    let idTravel = JSON.parse(TitreSejour.value)["id"];
    let descriptionTravel = document.getElementById('descriptionSejour');

    let data = {
        "idTravel": idTravel,
        "description": descriptionTravel.value,
        "housings": housingsData,
        "domains": DomainData,
        "steps": StepData,
        "_token": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    }
    console.log(data)
    

    

    const requestModifieTravel = new Request(road, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"  // Indiquer que le corps de la requête est en JSON
        },
        body: JSON.stringify(data)  // Convertir l'objet `data` en JSON
    });

    fetch(requestModifieTravel)
    .then(response => {
        if (!response.ok) {
            throw new Error('Erreur réseau : ' + response.status);
        }
        return response;  // Récupérer les données JSON de la réponse
    })
    .then(data => {
        console.log('Réponse du serveur:', data);
        // Si la réponse contient une indication de succès, vous pouvez afficher un toast
        let toast = document.getElementById('toastMessage');
        if (toast) {
            console.log("test")
            toast.innerHTML = '<i class="fas fa-check-circle"></i>';
            toast.innerText = 'Succès de la requête!';  // Modifier le message si nécessaire
            toast.style.opacity = 1; // S'assurer que le toast est visible
            toast.style.transition = 'opacity 1s ease';  // Transition pour l'effet
            toast.style.backgroundColor = '#28a745';
            // Faire disparaître le toast après 3 secondes
            setTimeout(function() {
                toast.style.opacity = 0;  // Faire disparaître le toast
            }, 3000); // Le toast disparaît après 3 secondes
        }
    })
    .catch(error => {
        console.error('Erreur:', error);
        // Optionnel : vous pouvez afficher un message d'erreur dans le toast en cas d'échec
        let toast = document.getElementById('toastMessage');
        if (toast) {
            toast.innerHTML = '<i class="fa-solid fa-x"></i>';
            toast.innerText = 'Erreur lors de la requête.';
            toast.style.opacity = 1;
            toast.style.transition = 'opacity 1s ease';
            toast.style.backgroundColor = '#f54242';
            setTimeout(function() {
                toast.style.opacity = 0;
            }, 3000);
        }
    });
});





