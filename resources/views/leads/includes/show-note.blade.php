<div class="flex flex-row justify-between items-center	">
    <p class="uppercase text-xs text-gray-400">{{__('leads.note')}}</p>
    <span>
        <button 
        type="button" 
        class="bg-gray-800 text-xs text-white p-1.5 px-2 border border-white rounded-md dark:bg-gray-900 mr-1" 
        wire:click ="editNote({{ $lead->id }})"
        > {{__('leads.update')}} </button>                            
    </span>
</div>
<div class="mb-4">
    <p class="text-normal">
        @php 
        print_r(nl2br($lead->note));
        @endphp
    </p>
</div>