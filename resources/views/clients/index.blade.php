<x-app-layout>
    <x-a-header>
        <div></div>
        <x-a-title-header title="{{__('clients.clients')}}" />
    </x-a-header>

    <div class="relative min-h-screen">
        @livewire('clients.clients-index')
    </div>
</x-app-layout>
