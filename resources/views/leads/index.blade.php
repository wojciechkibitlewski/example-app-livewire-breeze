<x-app-layout>
    <x-a-header>
        <div></div>
        <x-a-title-header title="{{__('leads.leads')}}" />
    </x-a-header>

    <div class="relative min-h-screen">
        @livewire('leads.leads-index')
    </div>
</x-app-layout>
