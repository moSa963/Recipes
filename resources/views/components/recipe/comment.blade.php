@props(['comment'])


<div class="mb-10 w-full" >
    <div class="flex mx-3 sm:mx-1 items-center">
        <span class="flex justify-center items-center w-10 h-10 rounded-full overflow-hidden">
            <img class="w-full h-full" src="https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fimages.media-allrecipes.com%2Fuserphotos%2F8079468.jpg" />
        </span>
        <p class="p-2">{{ $comment->username }}</p>
        
        <x-recipe.rating-card avg="{{ intval($comment->rating) }}" />

    </div>
    <p>{{ $comment->comment }}</p>
</div>