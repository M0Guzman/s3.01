<x-app-layout>
    <div class="container">
        <h1 class="title">Route des Vins</h1>
        <section class="intro">
            <h2>PARTIR SUR LA ROUTE DES VINS</h2>
            <p>
                La route des vins est une route touristique qui vous plonge au cœur des régions viticoles, à la rencontre du vin bien sûr,
                des viticulteurs, du vignoble, mais également de la gastronomie, du patrimoine culturel et des autres atouts touristiques régionaux.
                Le développement de l’œnotourisme, en France et à l’international, a conduit à la création du concept de route des vins, qu’il ait été
                créé par des organismes institutionnels du tourisme visant à mettre en avant une région viticole ou qu’il s’agisse simplement d’un circuit
                touristique recommandé par un guide. Cela reste une expérience de visite unique d’un vignoble permettant de concilier découverte du vin et
                exploration d’une région !
            </p>
        </section>

        <div class="images">
            <img src="{{ Vite::asset('resources/images/vrdv.jpg') }}" alt="Vignoble Alsace">
            <img src="{{ Vite::asset('resources/images/trdv.jpg') }}" alt="Cave à Vin">
            <img src="{{ Vite::asset('resources/images/rdv.jpg') }}" alt="Route des Vins en Nature">
        </div>

        <section class="routes">
            <h2>LES ROUTES DES VINS EN FRANCE</h2>
            <p>
                Les routes des vins sillonnent tous les vignobles français. Créées à partir des années 1950, ces itinéraires vous offrent l’opportunité
                unique de plonger, tête la première, au cœur d’une région viticole : découvertes œnologiques, culturelles et gastronomiques sont au programme.
            </p>
            <p>
                Aujourd’hui près de 7,5 millions d’œnotouristes<span>*</span> parcourent les routes des vins chaque année : Français et étrangers, débutants et experts,
                tous les publics se retrouvent pour une balade de caves en caves, de dégustations de vins en visites de domaines. De la route la plus longue
                à la plus brève, la plus ensoleillée à la plus fraîche, nous vous proposons un petit tour d’horizon des routes des vins de France,
                à visiter ou à (re)visiter. Les itinéraires des routes des vins de France sont à parcourir comme il vous plaît : en voiture, à pied ou à vélo !
            </p>
            <p>
                * Source : <a href="https://www.atout-france.fr/" target="_blank">Atout France</a>, Tourisme et Vin - données 2023
            </p>
        </section>
    </div>

    <section class="routes-vins">
        <h2>Découvrez les Routes des Vins</h2>
            <div class="images-two-by-two">
                @foreach ($wine_roads as $road)
                    <div class="route-item">
                        <img
                            src="{{ $road->resources[0]->get_url() }}"
                            alt="Image de {{ $road->name }}"
                            class="route-image"
                        >


                        <p id="title">
                            {{ $road->name }}
                        </p>

                        <p id="description">
                            {{ mb_substr($road->description, 0, 100, 'UTF-8') }}...
                        </p>

                        <a href="{{ route('wine-road.show', ['id' => $road->id ]) }}">
                            <button>Découvrir la Route des Vins</button>
                        </a>
                    </div>
                @endforeach
            </div>

    </section>


</x-app-layout>
