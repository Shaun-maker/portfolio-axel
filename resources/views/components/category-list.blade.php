<div class="flex gap-16 justify-center mt-24">
    @foreach($categories as $category)
    <x-category-item :$loop :$category>
        {{ $category->name }}
    </x-category-item>
    @endforeach
    @auth
        <x-edit-button class="static" />
    @endauth
</div>