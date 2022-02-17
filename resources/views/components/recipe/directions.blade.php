@props(['directions'])


<section class="w-full">
    <p class="text-xl mb-5">Directions: </p>
    <ul class="pl-5">
        @foreach (explode("\n", $directions) as $key => $step)
            <li class="mb-5">
                <p class="font-bold text-lg"> Step {{ $key + 1 }}:</p>
                <div class="w-full p-1 m-1 bg-gray-100 rounded">
                    <p>{{$step}}</p>
                </div>
            </li>
        @endforeach
    </ul>
</section>