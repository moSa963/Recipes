<x-app-layout name="Recipes">

    <div class="col-span-12 flex justify-center">
        <div class="w-full max-w-4xl bg-white shadow sm:m-10 p-5">
            <div id="cardsCont" class="col-span-12 sm:col-span-8 grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-2 p-7">
                <!-- cards generated using javascript -->
            </div>
        </div>
    </div>

    <script src="{{ asset("js/recipe-list.js") }}" defer></script>
</x-app-layout>