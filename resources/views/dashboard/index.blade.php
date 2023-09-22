<x-app-layout>
    <x-a-header>
        <div></div>
        <x-a-title-header title="{{__('dashboard.dashboard')}}" />
    </x-a-header>
    @if($tasks == 0)
    @else  
        @include('dashboard.includes.first-steep')
    @endif
    @include('dashboard.includes.buttons')

    
</x-app-layout>
