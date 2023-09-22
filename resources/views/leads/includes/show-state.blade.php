<p class="uppercase text-xs text-gray-400">{{__('leads.table_state')}}</p>
<div class="flex flex-row w-full justify-between items-center">
    <p class="text-2xl">{{ getStateName($lead->type_id) }}</p>
    <span>
        <button 
        type="button" 
        class="bg-gray-800 text-xs text-white p-1.5 px-2 border border-white rounded-md dark:bg-gray-900 mr-1" 
        wire:click ="editState({{ $lead->id }})"
        > {{__('leads.update')}} </button>  
    </span>
</div>
<div class="flex flex-row w-full justify-between items-center text-left"> 
    @if($lead->type_id == 2)
        @if(isset($todo->note))
        <p class="text-left">{{$todo->note}}</p>
        <div></div>
        @else
        <div></div>
        <button 
        type="button" 
        class="bg-gray-800 text-xs text-white p-1.5 px-2 border border-white rounded-md dark:bg-gray-900 mr-1 mt-2" 
        wire:click ="addTodo('{{ $lead->prefix }}')"
        > {{__('leads.add_to_todo')}} </button> 
        @endif
    @endif
</div>