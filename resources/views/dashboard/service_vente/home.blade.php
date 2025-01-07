<x-dashboard-layout><link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>

    <div class="flex flex-col sm:justify-center items-center sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="mt-4 mb-4">Nombre de séjour vendu sur les derniers 30 jours: {{ $sales_count }}</div>
        <br>

        <div class="flex flex-wrap justify-center justify-items-center content-center items-center gap-6">
            <div style="width: 400px;"><canvas id="sales_per_states"></canvas></div>
            <div style="width: 400px;"><canvas id="sales_per_vineyards"></canvas></div>
            <div style="width: 400px;"><canvas id="sales_per_departments"></canvas></div>
            <div style="width: 400px; height: 280px;">
                <div class="text-center mb-4">Répartitions des ventes par villes</div>
                <div id="map" class="w-full h-full"></div>
            </div>
        </div>
    </div>

    <script>
        const sales_per_states = @json($sales_per_states);
        const sales_per_vineyards = @json($sales_per_vineyards);
        const sales_per_departments = @json($sales_per_departments);
        const sales_per_cities = @json($sales_per_cities);
    </script>
    @vite(['resources/js/dashboard/sales/home.js'])
</x-dashboard-layout>
