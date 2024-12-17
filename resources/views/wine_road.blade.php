<x-app-layout>
    <div class="flex flex-col sm:justify-center items-center sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="w-full sm:max-w-6xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <div class="text-2xl font-bold text-center mb-4">{{ $wineroad->name }}</div>
            <p>{{ $wineroad->description }}</p>


            <div class="flex flex-wrap gap-8 justify-center">
                @foreach ($wineroad->travels as $travel)
                    <a href={{ route('travel.show', ['id' => $travel->id]) }} class="dark:bg-gray-600 show-md overflow-hidden sm:rounded-lg border w-52 h-52 p-2 transition hover:bg-gray-100 content-center">
                        <img class="w-52 h-32 object-cover" src="{{ $travel->resources[0]->get_url() }}"></img>
                        <div>{{ $travel->title }}</div>
                        <p>Voir plus de details</p>
                    </a>
                @endforeach
            </div>
            <br>
            <br>
            <br>
            <div id="Domaine">
                <h2 class="text-2xl font-bold text-center mb-4">Chateau et Domaine</h2>
                @foreach ($wineroad->travels as $travel)
                    @foreach ($travel->travel_steps as $travelStep)
                        @foreach ($travelStep->activities as $activity)
                            @if( $activity->partner->winecellar != null || $activity->partner->restaurant != null)
                                <div class="container_etape">
                                    <div class="image-section">
                                        <img class="img-etape" src="{{ $travelStep->resources[0]->get_url() }}">
                                    </div>
                                    <div class="info-section">
                                        <h3 class="titre-etape">{{ $activity->name }}</h3>
                                        <p>
                                            {{ $activity->description }}
                                        </p>
                                        <a href="{{ route('partner.show', ['id' => $activity->partner->id]) }}">En savoir plus sur notre partenaire {{$activity->partner->name}}</a>
                                    </div>
                                </div>
                                <br>
                                <br>
                            @endif
                        @endforeach
                    @endforeach
                @endforeach
            </div>
       </div>
    </div>
</x-app-layout>
