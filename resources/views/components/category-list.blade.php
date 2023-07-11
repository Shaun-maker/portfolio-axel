<div class="flex gap-16 justify-center mt-16">
    @foreach($categories as $category)
        <x-category-item :$loop>
            {{ $category->name }}
        </x-category-item>
    @endforeach
</div>