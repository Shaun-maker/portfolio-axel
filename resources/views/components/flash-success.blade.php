@if(session()->has('success'))
    <x-flash>
        <p class="text-white m-0">{{ session('success') }}</p>
    </x-flash>
@endif
