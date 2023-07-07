<form 
    {{ $attributes }}
    class="flex p-14 bg-light flex flex-col gap-12 rounded-3xl sm:w-[600px] w-[300px]"
>
    @csrf
    {{ $slot }}
</form>