@props(['selected'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="relative grid md:grid-cols-12 sm:grid-cols-1 bg-gray-200 min-h-screen">

            <x-nav-bar selected="{{ $selected }}"></x-nav-bar>
    
            <div class="w-full overflow-hidden col-span-12 -mb-14 sm:-mb-24 select-none">
                <div class="relative w-full max-h-[25vw] shadow-inner flex items-center justify-center">
                    <p class="absolute capitalize md:text-5xl sm:text-xl font-bold z-10">This is today's quote</p>
                    <img src="{{ url('img/back.png') }}" class="object-cover opacity-60 min-w-full" />
                </div>
            </div>
            
            <div class="grid grid-cols-12 col-span-12 z-10 min-h-full m-2 sm:m-0">
                {{ $slot }}
            </div>
    
            <section class="col-span-12 bg-black bg-opacity-20 p-10">
                <p>footer</p>
            </section>
        </div>
    </body>
</html>
