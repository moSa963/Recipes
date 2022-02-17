<x-app-layout name="none">
    <div class="col-span-12 justify-center grid grid-cols-12 z-10">

        <div class="col-span-12 md:col-span-3 p-2">
            <!-- User header -->
            <div class="bg-white shadow sm:m-5 p-5 h-fit flex flex-col items-center">
                <div class="flex relative w-full max-w-[120px] rounded-full aspect-square bg-gray-400 overflow-hidden justify-center items-center">
                    <img class="w-full h-full object-cover" src="{{ route("user.image", [$user->id]) }}" />

                    @if (Auth::check() && $user->id == Auth::user()->id)
                        <form method="POST" action="{{ route("user.update") }}" enctype="multipart/form-data">
                            @csrf
                            <input onchange="updateImage(event);" class="absolute w-full h-full top-0 left-0 right-0 bottom-0 opacity-0 cursor-pointer" type="file" name="image"/>
                        </form>
                    @endif

                </div>
                <p class="ml-5">{{$user->email}}</p>
            </div>

            @if (Auth::check() && $user->id == Auth::user()->id)
                    <div class="bg-white shadow sm:m-5 p-5 h-fit">
                        <form action="{{ route("logout") }}" method="POST">
                            @csrf
                            <input class="w-full p-2 bg-red-400 text-black rounded bg-opacity-20 cursor-pointer hover:opacity-75" type="submit" value="LOGOUT"/>
                        </form>
                    </div>
            @endif
        </div>

        <div class="col-span-12 md:col-span-9 max-w-4xl bg-white shadow sm:m-10 p-5">

            <div id="cardsCont" data-userid="{{ $user->id }}" class="col-span-12 sm:col-span-8 grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-2 p-7" >
                <!-- cards generated using javascript -->
            </div>

        </div>
    </div>

    <!-- js -->
    <script src="{{ asset("js/user-show.js") }}" defer></script>
    <script src="{{ asset("js/recipe-list.js") }}" defer></script>
</x-app-layout>