<x-app-layout>
    @vite(['resources/js/partner.js', 'resources/scss/travel/partner.scss'])
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
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
                    <p>{{ $partner->description }}</p>
                </div>
            </section>
        </div>

        <div class="container_map">
            <div id="address" data-address="{{ $partner->address->street }}"></div>
           

            <!-- Remplacer la carte par un lien vers le site de l'hébergement -->
            <div class="website-link">
                <a href="https://www.radissonhotels.com/fr-fr/destination/france/nice?facilitatorId=RHGSEM&cid=a%3Aps+b%3Abng+c%3Aemea+i%3Ageneric+e%3Arhg+d%3Aukirwe+r%3Agnr+f%3Afr-FR+g%3Aho+h%3ANCE+v%3Acf&gclid=b6327bda8eb61a5d10d51ca163345479&gclsrc=3p.ds&msclkid=b6327bda8eb61a5d10d51ca163345479&utm_source=bing&utm_medium=cpc&utm_campaign=MS_FRA_CR_EMEA_gn_Generic_No+Location_Multiple-Grouped-T1_FR_BM_Multiple&utm_term=H%C3%B4tel+nice&utm_content=MS_FRA_CR_NOWE_gn_Generic_Nice_NCE_FR_BM_France" target="_blank" class="btn btn-primary">
                    Voir le site de l'hébergement
                </a>
            </div>
        </div>

        <!--teste role-->
        @if(hasRole('Service_vente'))
            <div class="container_partenaire" id="serviceVente">
                <p>Bienvenue dans le Service Vente !</p>
            </div>
        @elseif(hasRole('Directeur_service_vente'))
            <div class="container_partenaire" id="directeurServiceVente">
                <p>Bienvenue, Directeur du Service Vente !</p>
            </div>
        @elseif(hasRole('Service_marketing'))
            <div class="container_partenaire" id="serviceMarketing">
                <p>Bienvenue dans le Service Marketing !</p>
            </div>
        @elseif(hasRole('executive'))
            <div class="container_partenaire" id="dirigeant">
                <p>Bienvenue, Dirigeant !</p>
            </div>
        @else
            <div class="container_partenaire" id="harg">
                <p>Bienvenue, Simple utilisateur !</p>
            </div>
        @endif
        <!--end teste-->
    </section>
</x-app-layout>