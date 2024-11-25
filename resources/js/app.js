import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.getElementById('search-button').addEventListener('click', () => {
    const vignoble = document.getElementById('vignoble').value;
    const duree = document.getElementById('duree').value;
    const pourQui = document.getElementById('pour-qui').value;
    const envie = document.getElementById('envie').value;
  
    /*if (!vignoble && !duree && !pourQui && !envie) {
      alert('Veuillez remplir tous les champs pour effectuer une recherche.');
      return;
    }*/
  
    // Simuler une recherche ou rediriger vers une page avec les filtres appliqués
    console.log(`Recherche : Vignoble = ${vignoble}, Durée = ${duree}, Pour qui = ${pourQui}, Envie = ${envie}`);
    //alert(`Recherche effectuée avec les critères : \nVignoble : ${vignoble}\nDurée : ${duree}\nPour qui : ${pourQui}\nEnvie : ${envie}`);
  });

  // Exemple d'incrémentation du panier
document.querySelector('.panier').addEventListener('click', () => {
    const panierCount = document.querySelector('.panier-count');
    let currentCount = parseInt(panierCount.textContent);
    panierCount.textContent = currentCount + 1; // Ajoute 1 au compteur
  });
  
  