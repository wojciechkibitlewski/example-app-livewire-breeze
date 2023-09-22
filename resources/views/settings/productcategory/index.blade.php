<x-app-layout>
    <x-a-header>
        <div></div>
        <x-a-title-header title="{{__('settings.category')}}" />
    </x-a-header>

    <div class="relative min-h-screen">
        @livewire('settings.product-category.product-category-index')
    </div>
</x-app-layout>
