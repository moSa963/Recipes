<x-app-layout name="Home">

    <!-- cards container -->
    <div class="col-span-12 sm:col-span-8 grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-2 p-7">

        @foreach ($recipes as $recipe)
            <x-recipe.card :recipe="$recipe"></x-recipe-card>
        @endforeach

        <div class="w-full text-center">
            <a href="{{ route("recipe.list") }}" class="text-blue-800 cursor-pointer hover:scale-105">more?</a>
        </div>
    </div>

    <div class="col-span-12 sm:col-span-4 p-5">
        <div class="shadow bg-white p-5 text-center w-full">
            <p class="text-xl mb-2 border-b-2">Options</p>
            <a href="{{ route("recipe.create") }}" class="w-full capitalize hover:bg-blue-500 hover:bg-opacity-25 p-2 rounded transition-colors mb-2" title="create new recpe">
                Create
            </a>
        </div>
    </div>

    @if (!Auth::check())
        <section class="col-span-12 flex flex-col items-center justify-center py-10 bg-gray-400 my-5"> 
            <p class="text-lg md::text-5xl sm:text-xl mb-3">Create an account now</p>
            <p class="text-xs md::text-xl sm:text-lg tracking-widest">To share all your unique recipes with others</p>
        </section>  
    @endif

</x-app-layout>