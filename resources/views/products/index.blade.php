<x-app-layout>
    <x-a-header>
        <div></div>
        <x-a-title-header title="{{__('products.products')}}" />
    </x-a-header>

    <div class="relative min-h-screen">
        @livewire('products.products-index')
    </div>
</x-app-layout>
