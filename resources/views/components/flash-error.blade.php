@if($errors->any())
    <x-flash>
        @foreach($errors->all() as $error)
            <p class="text-red-300 font-bold">{{ $error }}</p>
        @endforeach
    </x-flash>
@endif