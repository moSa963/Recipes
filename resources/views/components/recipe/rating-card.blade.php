@props(['avg'])


<div class="w-full flex">
    @for ($i = 0; $i < 5; $i++)
        <x-recipe.star fill="{{ $i < $avg ? 'green' : 'none' }}"></x-recipe.star>
    @endfor
</div>