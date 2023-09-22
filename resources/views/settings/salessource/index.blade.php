<x-app-layout>
    <x-a-header>
        <div></div>
        <x-a-title-header title="{{__('settings.source')}}" />
    </x-a-header>

    <div class="relative min-h-screen">
        @livewire('settings.sales-source.sales-source-index')
    </div>
</x-app-layout>
