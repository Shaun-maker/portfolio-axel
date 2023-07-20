@if(session()->has('success'))
    <x-flash>
        <p class="text-white">{{ session('success') }}</p>
    </x-flash>
@endif