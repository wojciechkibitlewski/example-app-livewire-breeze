<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'PhotoCRM') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:wght@100;300;400;500;700;800;900&family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>
        <div class="md:flex md:flex-row font-sans antialiased min-h-screen
        bg-stone-100 text-stone-800 
        dark:bg-grayBlack dark:text-gray-100 ">
            <div class="w-full md:basis-1/2 xl:basis-2/3 h-1/4 min-h-full 
            bg-stone-300 text-stone-800
            dark:bg-grayBlack dark:text-gray-100
            ">
                <div class="flex flex-col md:min-h-screen justify-between">
                    <div class="p-6 ">
                        <a href="{{route('dashboard')}}" class="flex-1 w-full">
                            <img src="{{asset('images/logo.png')}}" alt="PhotoCRM" class="block dark:hidden h-6">
                            <img src="{{asset('images/dark-logo.png')}}" alt="PhotoCRM" class="hidden dark:block h-6">
                        </a>
                    </div>
                    <div class="p-6 text-2xl md:text-4xl xl:text-6xl text-grayDark font-bold mb-8 mr-12 md:mb-[20%]  xl:mb-[10%]">
                        {{__('home.homeTitle')}}<br/>
                        {{__('home.homeDesc')}}
                    </div>

                </div>
            </div>
            <div class="w-full md:basis-1/2 xl:basis-1/3 h-3/4 md:min-h-screen">
                {{ $slot }}
                
            </div>
        </div>

        @livewireScripts
    </body>
</html>
