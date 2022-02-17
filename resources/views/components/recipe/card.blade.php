@props(['recipe'])

<a href="{{ route("recipe.show", [$recipe->id]) }}" class="card">
    <div class="absolute top-2 left-2 rounded-md bg-slate-600 bg-opacity-50 p-1">
        <p class="text-sm text-white">@ {{ $recipe->username }}</p>
    </div>
    <img src="{{ route("recipe.image", [$recipe->id, $recipe->img_id]) }}" class="object-cover " />
    <x-recipe.rating-card avg="{{ intval($recipe->rating) }}" />
    <div class="m-2">
        <div class="max-h-12 overflow-hidden mb-2">
            <p class="max-h-full overflow-hidden text-ellipsis">{{$recipe->title}}</p>
        </div>
        <p class="overflow-hidden whitespace-nowrap text-gray-600 text-sm text-ellipsis">
            {{$recipe->description}}
        </p>
    </div>
</a>