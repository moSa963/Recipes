@props([
'items' => [
    ['name' => 'Home', 'route' => route("home")], 
    ['name' => 'Recipes', 'route' => route("recipe.list")], 
    ['name' => 'Create', 'route' => route("recipe.create")], 
], 'selected' ])

<nav>
    <div class="grid grid-cols-1 sm:grid-cols-12">

        <section class="col-span-2">
            <a href="{{ route("home") }}" class="text-2xl hover:opacity-90 col-span-2">
                {{ config("app.name", 'Laravel') }}
            </a>
        </section>

        <section class="col-span-10 sm:col-span-1">
            <div id="menuBtn" class="justify-center items-center ml-auto h-full flex sm:hidden hover:opacity-60 cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>                
            </div>
        </section>

        <section class="col-span-12 sm:col-span-9 flex sm:justify-end transition-all">
            <ul id="navToolBar" class="flex flex-wrap h-0 sm:h-fit flex-col sm:flex-row overflow-hidden ">
                
                @foreach ($items as $item)                    
                    <li class="{{ $selected == $item["name"] ? "border-b-2" : ''}} flex mx-3 sm:mx-1 hover:bg-gray-800 hover:bg-opacity-30 items-center">
                        <a href="{{ $item["route"] }}" class="p-2">{{ $item["name"] }}</a>
                    </li>
                @endforeach

                <!--Auth nav link-->
                @if (Auth::check())
                    <li class="flex mx-3 sm:mx-1 hover:opacity-60 border-l-2 items-center">
                        <a href="{{ route("user.create") }}" class="p-2">{{ Auth::user()->name }}</a>
                        <span class="flex justify-center items-center w-10 h-10 rounded-full overflow-hidden">
                            <img class="w-full h-full" src="{{ route("user.image", [Auth::user()->id]) }}" />
                        </span>
                    </li>
                @else
                    <li class="flex mx-3 sm:mx-1 hover:opacity-60 border-l-2 items-center">
                        <a href="{{ route("register") }}" class="p-2">Sign in</a>
                        <span class="inline-block">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </span>
                    </li>
                @endif

            </ul>
        </section>

    </div>
</nav>