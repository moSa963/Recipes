@props(['ingredients'])


<section class="w-full">
    <p class="text-xl mb-5">Ingredients: </p>
    <ul class="pl-5">
        @foreach (explode("\n", $ingredients) as $i)
            <li class="w-full p-1 m-1 bg-gray-100 rounded">
                <p>{{$i}}</p>
            </li>
        @endforeach
    </ul>
</section>