@if($errors->any())
    <x-flash>
        @foreach($errors->all() as $error)
            <p class="text-red-300 font-bold p-0">{{ $error }}</p>
        @endforeach
    </x-flash>
@endif
