@if($errors->any())
    <x-flash>
        @foreach($errors->all() as $error)
            <p class="text-red-950">{{ $error }}</p>
        @endforeach
    </x-flash>
@endif