<x-app-layout>
    <x-a-header>
        <div></div>
        <x-a-title-header title="{{__('todo.todo')}}" />
    </x-a-header>

    <div class="relative">        
        <div class="overflow-x-auto">
            @livewire('todo.todo-table')
        </div> 
    </div>
</x-app-layout>
