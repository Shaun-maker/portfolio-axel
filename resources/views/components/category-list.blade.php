<div class="flex flex-col sm:flex-row items-center gap-16 justify-center mt-24 flex-wrap">
    @foreach($categories as $category)
    <x-category-item :$loop :$category>
        {{ $category->name }}
    </x-category-item>
    @endforeach
    @auth
        <x-edit-button data-edit-button="project" class="static" />
    @endauth
</div>