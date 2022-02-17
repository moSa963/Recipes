@props(['urls'])


<section class="w-full flex justify-center ">
    <div class="relative w-full aspect-square max-w-lg max-h-96 flex overflow-x-auto snap-x snap-mandatory select-none">

        @foreach ($urls as $url)
            <div class="h-full w-full min-w-full flex justify-center items-center snap-center" >
                <img src="{{ url('recipe/'.$url->recipe_id.'/image/'.$url->id) }}" class="w-full h-full object-contain" />
            </div>
        @endforeach

    </div>
</section>