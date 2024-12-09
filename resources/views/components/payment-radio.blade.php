@props(['id'])

<label for="{{ $id }}">
    <div class="dark:bg-gray-600 show-md overflow-hidden sm:rounded-lg border w-48 h-48 p-8 transition hover:bg-gray-100 content-center">
        {{ $slot }}
        <input id="{{ $id }}" type="radio" class="payment-radio hidden" {!! $attributes->merge() !!} />
    </div>
</label>

