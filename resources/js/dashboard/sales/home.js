import Chart from 'chart.js/auto';
import L from 'leaflet';

const map = L.map('map').setView([45.901643496, 6.118095198], 5);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

for(const city of sales_per_cities) {
    L.circle([city.latitude, city.longitude], {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: city.count * 100
    }).addTo(map).bindTooltip(`${city.name}: ${city.count}`)
}

function setupChart(canvas, data, options = {}) {
(async function() {
  new Chart(
    canvas,
    {
      type: 'pie',
      data: {
        labels: data.map(row => row.name),
        datasets: [
          {
            label: 'Vente sur les 30 derniers jours',
            data: data.map(row => row.count)
          }
        ]
      },
        options
    }
  );
})();
}

setupChart(document.getElementById("sales_per_states"), sales_per_states, {
    plugins: {
        title: {
            display: true,
            text: 'Nombres de ventes par etats'
        }
    }
});

setupChart(document.getElementById("sales_per_vineyards"), sales_per_vineyards, {
    plugins: {
        title: {
            display: true,
            text: 'Nombres de ventes par catégories'
        }
    }
});

setupChart(document.getElementById("sales_per_departments"), sales_per_departments, {
    plugins: {
        title: {
            display: true,
            text: 'Nombres de ventes par départements'
        }
    }
});
