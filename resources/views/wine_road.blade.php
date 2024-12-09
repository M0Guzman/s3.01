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
       </div>
    </div>
</x-app-layout>
