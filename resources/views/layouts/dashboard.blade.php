<x-app-layout>
    @vite(['resources/scss/dashboard/dashboard.scss'])

    <div id="container_dashboard">
        <div id="sidebar">
            <!--<a href="">Administrateur</a>
            <a href="">Modérateur</a>-->
            @if(hasRole("marketing_department"))<a href="{{ route("dashboard.vente.Sejour.afficher") }}">Service Marketing</a>@endif
            @if(hasRole("sales_department") || hasRole("sales_department_director"))<a href="{{route('commandes_client.show')}}">Service Vente</a>@endif
            @if(hasRole("sales_department_director"))<a href="{{ route('dashboard.vente.homepage.show') }}">Directeur Service Vente</a>@endif
            @if(hasRole("executive"))<a href="{{route('dashboard.dirigeant.validate.Travel') }}">Dirigeant</a>@endif
        </div>

        <div id="content">
            <main >
                {{ $slot }}
            </main>
        </div>
    </div>





</x-app-layout>
