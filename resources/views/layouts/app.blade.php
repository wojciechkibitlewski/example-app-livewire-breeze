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
        @vite(['resources/js/light-mode.js',])

        <link rel="icon" href="{{asset('images/ico.png')}}" sizes="32x32">
        <link rel="apple-touch-icon" href="{{asset('images/ico.png')}}">
        <!-- Styles -->
        @livewireStyles
        <style>
            [x-cloak] { display: none !important; }
        </style>
    </head>
    <body class="font-sans antialiased bg-white text-stone-800 
        dark:bg-stone-900 dark:text-gray-100">
        <div 
        class="relative z-[10] sticky top-0 h-16 md:h-20 flex justify-between items-center w-full p-2 px-4 md:p-4 border-b 
        bg-stone-200 text-stone-800 border-gray-300
        dark:bg-stone-950 dark:text-gray-100 dark:border-gray-700">
        
        <div  class="flex items-center">
            @include('layouts.includes.sidenav-button')
            @include('layouts.includes.logo')

        </div>
        <div class="flex items-center">
            @include('layouts.includes.light-switch')
            @include('layouts.includes.user-menu')

        </div>
    </div>
    
    <div class="w-full">
        @include('layouts.includes.sidenav-left-mobile')
        @include('layouts.includes.sidenav-left')

        <div class="md:pl-[288px]" style="" id="content">
            {{ $slot }}
            
            <div class="w-full p-4">
                @include('includes.guest-footer')
            </div>
        </div>
        
        
    </div>

    @stack('modals')
   
    @livewireScripts
</body>
</html>