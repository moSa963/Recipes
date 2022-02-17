<x-app-layout name="Create">

    <div class="col-span-12 flex justify-center">
        <div class="w-full max-w-4xl bg-white shadow sm:m-10 p-5">
            
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form action="{{ route("recipe.store") }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input required class="textInput" type="text" placeholder="title..." name="title" autocomplete="false"/>
                
                <hr class="m-4"/>
                
                <input required class="textInput" type="text" placeholder="category..." name="category" />

                <hr class="m-4"/>

                <p>About</p>
                <div class="flex flex-col sm:flex-row p-2 flex-wrap">
                    <div class="ml-2">
                        <label for="cookTime" >Cook time</label>
                        <input id="cookTime" class="w-16 outline-none bg-slate-100 text-center" min="1" type="number" name="cook_time" value="1"/>
                        <p class="inline text-sm text-gray-300">min</p>
                    </div>
                    <div class="ml-2">
                        <label for="preparationTime" >Prep time</label>
                        <input id="preparationTime" class="w-16 outline-none bg-slate-100 text-center" min="1" type="number" name="preparation_time" value="1"/>
                        <p class="inline text-sm text-gray-300">min</p>
                    </div>
                    <div class="ml-2">
                        <label for="servings" >Servings</label>
                        <input id="servings" class="w-16 outline-none bg-slate-100 text-center" min="1" type="number" name="servings" value="1"/>
                        <p class="inline text-sm text-gray-300">person</p>
                    </div>
                </div>
                <hr class="m-4"/>

                <label for="description">Description</label>                    
                <input id="description" class="textInput" type="text" placeholder="description..." name="description" autocomplete="false"/>

                <hr class="m-4" />

                    <label for="ingredients">Ingredients</label>
                    <div id="ingredients" class="p-3">
                        <input required id="ingredient" class="textInput" type="text" placeholder="ingredient..." name="ingredients[]" autocomplete="false"/>
                    </div>

                <hr class="m-4" />

                    <label for="directions">Directions</label>
                    <div id="directions" class="p-3">
                        <input required id="step" class="textInput" type="text" placeholder="Step..." name="directions[]" autocomplete="false"/>
                    </div>

                <hr class="m-4"/>

                <div >
                    <label for="note">Note</label>                    
                    <input id="note" class="textInput" type="text" placeholder="note..." name="note" autocomplete="false"/>
                </div>

                <hr class="m-4"/>
                <label for="images">Images</label>                    
                <input required id="images" type="file" class="w-full" multiple accept="image/*" name="images[]"/>

                <hr class="m-4"/>

                <div class="w-full flex justify-center">
                    <input class="p-2 bg-blue-400 text-black rounded bg-opacity-20 cursor-pointer hover:opacity-75" type="submit"/>
                </div>

            </form>
        </div>
    </div>
    
    <script src="{{ asset("js/createPage.js") }}" defer></script>
</x-app-layout>