<x-app-layout name="none">
    
    <x-recipe.report recipe="{{ $recipe->id }}"/>

    <div class="grid grid-cols-12 col-span-12 z-10">
        <div class="col-span-12 md:col-span-3">

            <div class="bg-white shadow sm:m-5 p-5 h-fit flex flex-col justify-center items-center">
                <div class="flex relative w-full max-w-[120px] rounded-full aspect-square bg-gray-400 overflow-hidden justify-center items-center">
                    <img class="w-full h-full object-cover" src="{{ route("user.image", [$recipe->user_id]) }}" />
                </div>
                <p>Created by: <span><a href="{{ route("user.show", [$recipe->user_id]) }}">{{ $recipe->username }}</a></span></p>
            </div>

            <div class="bg-white shadow sm:m-5 p-5 h-fit">
                <x-recipe.rating-card avg="{{ intval($recipe->rating) }}" />
            </div>

            <div class="bg-white shadow sm:m-5 p-5 h-fit">
                <p>category: {{ $recipe->categories_name }}</p>
                <p>cook: {{ $recipe->cook_time }} <span class="text-sm text-gray-600">min</span></p>
                <p>prep: {{ $recipe->preparation_time }} <span class="text-sm text-gray-600">min</span></p>
                <p>servings: {{ $recipe->servings }} <span class="text-sm text-gray-600">person</span></p>
            </div>

            <div class="bg-white shadow sm:m-5 p-5 h-fit">
                <button onclick="toggleReportCard();" class="w-full p-2 bg-red-400 text-black rounded bg-opacity-20 hover:opacity-75">Report</button>
            </div>

            @if (Auth::check() && Auth::user()->id == $recipe->user_id)
                <div class="bg-white shadow sm:m-5 p-5 h-fit">
                    <button onclick="deleteRecipe({{$recipe->id}});" class="w-full p-2 bg-red-400 text-black rounded bg-opacity-20 cursor-pointer hover:opacity-75">DELETE</button>
                </div>
            @endif

        </div>

        <div class="col-span-12 md:col-span-9 flex flex-col items-center ">
            <div class="w-full max-w-4xl bg-white shadow sm:m-10 p-5">

                <section class="w-full">
                    <p class="text-xl mb-2">{{ $recipe->title }}</p>
                    <p class="text-lg text-gray-800">{{ $recipe->description }}</p>
                </section>

                <hr class="m-5"/>
                
                <x-images-container :urls="$imgs"/>

                <hr class="m-5"/>
                
                <x-recipe.ingredients ingredients="{{ $recipe->ingredients }}" />

                <hr class="m-5"/>

                <x-recipe.directions directions="{{ $recipe->directions }}" />

                <hr class="m-5"/>

                <section class="w-full">
                    <p class="text-xl">Note: {{ $recipe->note }}</p>
                </section>
            </div>

            <div class="w-full max-w-4xl bg-white py-10 shadow sm:m-10 p-5">

                <x-recipe.comment-form id="{{ $recipe->id }}"/>

                <hr class="m-4"/>

                <div id="commentsCont" class="w-full"> 
                    
                    @foreach ($comments as $comment )
                        <x-recipe.comment :comment="$comment"/>
                    @endforeach
                    
                </div>

                <div class="w-full text-center">
                    <button onclick="loadItems({{$recipe->id}});" class="text-blue-800 cursor-pointer hover:scale-105">more?</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset("js/recipe-show.js") }}" defer></script>
</x-app-layout>