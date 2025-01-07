<x-dashboard-layout>
@vite(['resources/scss/dashboard/dirigeant/dirigeant.scss'])

<div id="navigation">
    <a href="{{ route('dashboard.dirigeant.create.Travel') }}">Creation de Sejour</a>
    <a  href="{{ route('dashboard.dirigeant.validate.Travel') }}">Validation de Sejour</a>
</div>

<div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
  <h1 class="text-2xl font-bold mb-4">Validation de Sejour</h1>
</div>

</x-dashboard-layout>