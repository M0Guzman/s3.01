<x-app-layout>
    @vite(['resources/scss/dashboard/dashboard.scss'])

    <div id="container_dashboard">
        <div id="sidebar">
            <a href="">Administrateur</a>
            <a href="">Modérateur</a>
            <a href="{{ route('dashboard.vente.Partenaire.afficher') }}">Service Marketing</a>
            <a href="{{ route('dashboard.vente.homepage.show') }}">Directeur Service Vente</a>
        </div>

        <div id="content">
            <main >
                {{ $slot }}
            </main>
        </div>
    </div>





</x-app-layout>
