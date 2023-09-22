<x-app-layout>
    <x-a-header>
        <div></div>
        <x-a-title-header title="{{__('leads.leads')}}" />
    </x-a-header>

    <div class="relative min-h-screen">
        <div class="md:flex md:flex-row mt-8 ">
            <div class="basis-2/3 p-6">
                <div class="md:flex md:flex-row justify-between">
                    <h2 class="text-3xl font-bold mb-4">{{__('leads.help_h_3')}}</h2>
                    
                </div>
                @include('includes.message')
                @include('leads.includes.create-form_03')
            </div>
            <div class="basis-1/3 p-6">
            @include('leads.includes.helps')
            </div>
        </div>
    </div>
</x-app-layout>
