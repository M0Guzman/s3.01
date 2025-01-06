<header>
    @vite(['resources/scss/global/header.scss'])

    <!-- Header Top -->
    <div id="header-top">
        <nav>
            <ul>
                <li>
                    <a class="top_a" href="{{ route('dashboard.vente.hotel') }}">Dashboard</a>
                </li>
                <li><a class="top_a" href="#">Bénéficiaire cadeau</a></li>
                <li><a class="top_a" href="#">Contact</a></li>
                <li><a class="top_a" href="#">07 66 69 71 18</a></li>
                @if (Auth::check())
                    <!--<li>
                        <i class="fa-solid fa-child" style="color: #ffffff;"></i>
                        <a href="{{ route('profile.edit') }}">Mon compte</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}">Déconnexion</a>
                    </li> -->

                    <x-dropdown aligne="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md focus:outline-none transition ease-in-out duration-150">
                                <div>{{ strtoupper(Auth::user()->last_name) }} {{ Auth::user()->first_name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Mon compte') }}
                            </x-dropdown-link>

                            <-- Authentication --
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Déconnexion') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <li>
                        <a class="top_a" href="{{ route('login') }}">Se connecter</a>
                    </li>
                    <li>
                        <a class="top_a" href="{{ route('register') }}">s'enregistrer</a>
                    </li>
                @endif
                <li>
                    <a id="panier" href="{{ route('order.show') }}" id="header_panier">
                        <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
                        <span class="white">Panier</span>
                        <span id="panier-count" class="white">{{ $nborder }}</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Header bot -->
    <div id="header-bottom">
        <a href="/" id="img_container" class="container">
            <img id="img_VinoTrip" src="{{ Vite::asset('resources/images/logo.png') }}" alt="Logo VinoTrip">
        </a>
        <nav class="navigation">
            <ul>
                <li><a href="{{ route('travels.show')}}">Tous nos séjours</a></li>
                <li class="menu">
                    <a href="#">Destinations</a>
                    <ul id="subMenuDestination">
                    @foreach ($vinecats as $vinecat)
                        <li>
                            <a class="subcategory" href="{{ route('travels.show', ['vignoble' => $vinecat->name]) }}">{{ substr($vinecat->name,0,50) }}</a>
                        </li>
                    @endforeach
                    </ul>
                </li>
                <li class="menu">
                    <a href="#">Thématiques</a>
                    <ul class="menu-lvl2">
                        <li><a class="subcategory" href="https://www.vinotrip.com/fr/sejours-oenologiques-alsace">Alsace</a></li>
                        <li><a class="subcategory" href="https://www.vinotrip.com/fr/sejours-oenologiques-bordeaux">Bordeaux</a></li>
                        <li><a class="subcategory" href="https://www.vinotrip.com/fr/sejours-oenologiques-champagne">Champagne</a></li>
                    </ul>
                </li>
                <li class="menu">
                    <a href="#">Coffret cadeau</a>
                    
                    <!-- <ul class="menu-lvl2">
                        <li><a class="subcategory" href="#">..</a></li>
                    </ul> -->
                </li>
                <li class="menu">
                    <a href="#">Préparer votre séjour</a>
                    <ul class="menu-lvl2">
                        <li><a class="subcategory" href="{{ route('wine-road.index') }}">Route des vins</a></li>
                        <li><a class="subcategory" href="https://www.vinotrip.com/fr/vignoble">Guide des vignobles</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</header>
