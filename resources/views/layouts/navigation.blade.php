<header>
        <!-- Bande supérieure -->
        <div class="header-top">
            <ul>
                <li><a href="#">Bénéficiaire cadeau</a></li>
                <li><a href="#">Contact</a></li>
                <li><span>07 66 69 71 18</span></li>
                @if (Auth::check())
                    <!--<li>
                        <i class="fa-solid fa-child" style="color: #ffffff;"></i>
                        <a href="{{ route('profile.edit') }}">Mon compte</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}">Déconnexion</a>
                    </li> -->

 <x-dropdown align="right" width="48">
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
                        <a href="{{ route('login') }}">Se connecter</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}">S'enregistrer</a>
                    </li>
                @endif
                <li>
                    <a href="{{ route('order.show') }}" class="panier">
                        <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
                        <span>Panier</span>
                        <span class="panier-count">{{ $nborder }}</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Bande inférieure -->
        <div class="header-bottom">
            <a href="/" class="logo">
                <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="Logo VinoTrip">
               <!-- <p>Créateurs de séjours œnotouristiques</p> -->
            </a>
            <nav class="navigation">
                <ul class="hList">
                    <li><a href="{{ route('travels.show')}}"><p class="menu-title">Tous nos séjours</p></a></li>
                    <li class="menu">
                        <a href="#"><p class="menu-title">Destinations</p></a>
                        <ul class="menu-dropdown">
                        @foreach ($vinecats as $vinecat)
                            <li>
                                <a href="{{ route('travels.show', ['vignoble' => $vinecat->name]) }}">{{ substr($vinecat->name,0,50) }}</a>
                            </li>
                        @endforeach
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#"><p class="menu-title">Thématiques</p></a>
                        <ul class="menu-dropdown">
                            <li><a href="https://www.vinotrip.com/fr/sejours-oenologiques-alsace">Alsace</a></li>
                            <li><a href="https://www.vinotrip.com/fr/sejours-oenologiques-bordeaux">Bordeaux</a></li>
                            <li><a href="https://www.vinotrip.com/fr/sejours-oenologiques-champagne">Champagne</a></li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#"><p class="menu-title">Coffret cadeau</p></a>
                        <ul class="menu-dropdown">
                            <li><a href="#">Inexistan</a></li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#"><p class="menu-title">Préparer votre séjour</p></a>
                        <ul class="menu-dropdown">
                            <li><a href="https://www.vinotrip.com/fr/route-des-vins">Route des vins</a></li>
                            <li><a href="https://www.vinotrip.com/fr/vignoble">Guide des vignobles</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

<!-- <nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <-- Primary Navigation Menu --
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <-- Logo --
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <-- Navigation Links --
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <- Settings Dropdown --
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <--<div>{ { Auth::user()->name } }</div>--

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <-- Authentication --
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <- Hamburger --
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <-- Responsive Navigation Menu --
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <-- Responsive Settings Options --
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <--<div class="font-medium text-base text-gray-800 dark:text-gray-200">{ { Auth::user()->name } }</div>
                <div class="font-medium text-sm text-gray-500">{ { Auth::user()->email } }</div>--
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <-- Authentication --
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
-->
