@props(['recipe'])


<div id="reportCard" class="fixed w-full h-full top-0 right-0 left-0 bottom-0 items-center justify-center bg-black bg-opacity-75 z-[100] {{$errors->any() ? "flex" : "hidden"}}">
    <div class="w-full h-full max-w-[600px] max-h-96 overflow-hidden overflow-y-auto bg-white shadow p-5">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form action="{{ route("report.store") }}" method="POST">
            @csrf
            <input type="hidden" name="recipe_id" value="{{ $recipe }}" />
            <label for="titleInputBtn" >Title</label>
            <input id="titleInputBtn" required class="textInput" type="text" placeholder="Title..." name="title" autocomplete="false"/>
            
            <hr class="m-4"/>

            <label for="titleInputBtn" >Content</label>
            <textarea id="contentInputBtn" required class="textInput" placeholder="Report..." name="content"></textarea>
            <div class="w-full flex justify-evenly">
                <button onclick="toggleReportCard();" class="p-2 bg-blue-400 text-black rounded bg-opacity-20 cursor-pointer hover:opacity-75">Cancel</button>
                <input class="p-2 bg-blue-400 text-black rounded bg-opacity-20 cursor-pointer hover:opacity-75" type="submit" />
            </div>
        </form>
    </div>
</div>
