// Déclarer la carte globalement
let map;

// Passer l'adresse dynamique depuis Laravel (Blade) à JavaScript

const street = document.getElementById("address").getAttribute("data-address");
console.log(street); // Affiche l'adresse dans la console


// Fonction pour obtenir la latitude et la longitude à partir de l'API 
async function getCoordinates(address) {
    const url = `https://api-adresse.data.gouv.fr/search/?q=${encodeURIComponent(address)}&limit=1`;

    try {
        // Effectuer l'appel à l'API
        const response = await fetch(url);
        const data = await response.json();

        if (data.features && data.features.length > 0) {
            // Extraction de la latitude et de la longitude
            const coordinates = data.features[0].geometry.coordinates;
            const longitude = coordinates[0];
            const latitude = coordinates[1];

            // Afficher l'Adresse, la Latitude et la Longitude
            document.getElementById("result").innerHTML = `
                <p>Adresse: ${data.features[0].properties.label}</p>
                <p>Latitude: <span class="coordinates">${latitude}</span></p>
                <p>Longitude: <span class="coordinates">${longitude}</span></p>
            `;

            // Si une carte existe déjà, la supprimer
            if (map) {
                map.remove();
            }

            // Initialiser la carte
            map = L.map('map').setView([latitude, longitude], 13);

            // Ajouter un fond de carte
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Ajouter un marqueur à l'adresse
            L.marker([latitude, longitude]).addTo(map)
                .bindPopup(`<b>${data.features[0].properties.label}</b><br>Latitude: ${latitude}<br>Longitude: ${longitude}`)
                .openPopup();
        } else {
            document.getElementById("result").innerHTML = "Aucune adresse trouvée.";
            document.getElementById("map").innerHTML = ""; // Vider la carte si l'adresse n'est pas trouvée
        }
    } catch (error) {
        document.getElementById("result").innerHTML = "Une erreur est survenue lors de la recherche.";
        console.error("Erreur :", error);
    }
}

// Au chargement de la page, appeler la fonction avec l'adresse dynamique
document.addEventListener('DOMContentLoaded', () => {
    // Utilise l'adresse dynamique passée par Laravel
    getCoordinates(street);
});