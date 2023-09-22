<x-app-layout>
    <x-a-header>
        <div>
            <a href="{{route('clients.index')}}" title="{{__('clients.clients')}}"
            class="p-1 px-6 border border-white rounded-md mr-1 font-semibold bg-neutral-400 dark:bg-neutral-900 border-orange-600 text-gray-100 dark:text-gray-100 hover:bg-orange-700 dark:hover:bg-orange-700"
            >
            {{__('home.back')}} <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                stroke="currentColor" class="w-5 h-5 pb-1 inline">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                </svg></a>
        </div>
        <x-a-title-header title="{{__('clients.clients')}}" />
    </x-a-header>

    <div class="relative min-h-screen">
        <div class="md:flex md:flex-row mt-8 ">
            <div class="basis-2/3 p-6">
                <div class="md:flex md:flex-row justify-between">
                    <h2 class="text-3xl font-bold mb-4">{{__('clients.edit')}}</h2>
                    
                </div>
                @include('includes.message')
                @include('clients.includes.edit-form')
            </div>
            <div class="basis-1/3 p-6">
            </div>
        </div>
    </div>
</x-app-layout>
