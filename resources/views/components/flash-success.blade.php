@if(session()->has('success'))
    <x-flash>
        <p class="text-lime-900">{{ session('success') }}</p>
    </x-flash>
@endif