<x-app-layout>
    @vite(['resources/scss/dashboard/dashboard.scss'])

    <div id="container_dashboard">
        <div id="sidebar">
            <a href="">Administrateur</a>
            <a href="">Modérateur</a>
            <a href="">Service Marketing</a>
        </div>
        
        <div id="content">
            <main >
                {{ $slot }}
            </main>
        </div>
    </div>

    

    

</x-app-layout>