<x-app-layout>
    <x-a-header>
        <div></div>
        <x-a-title-header title="{{__('settings.type')}}" />
    </x-a-header>

    <div class="relative min-h-screen">
        @livewire('settings.sales-type.sales-type-index')
    </div>
</x-app-layout>
