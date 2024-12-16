<x-app-layout>
    @vite(['resources/scss/partner.scss'])
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
    </section>
</x-app-layout>