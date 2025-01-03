<x-app-layout>
    @vite(['resources/js/partner.js'])
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <section>

        <div class="container_partenaire">
            <div class="image-section">
                @foreach ($partner->resources as $resource)
                    @if ($resource != null)
                        <img src="{{ $resource->get_url() }}">
                        @break
                    @endif
                @endforeach
            </div>
            <section class="info-section">
                <div class="header">
                    <h3>{{ $partner->name }}</h3>
                </div>
                <div class="details">
                    <p>{{ $partner->description}}</p>
                </div>
            </section>
        </div>

        <div class="container_map">
            <div id="address" data-address="{{ $partner->address->street }}"></div>
            <div class="result" id="result">
                <!-- Les coordonnées seront affichées ici -->
            </div>

            <!-- Carte Leaflet -->
            <div id="map"></div>    
        </div>
    </section>
</x-app-layout>
