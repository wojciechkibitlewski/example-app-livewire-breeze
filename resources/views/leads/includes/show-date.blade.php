<p class="uppercase text-xs text-gray-400">{{__('leads.date')}}</p>
<div class="flex flex-row w-full justify-between items-center">
    <p class="text-lg md:text-2xl">{{$lead->executionDate}}, godz: {{ date("H:i", strtotime($lead->executionTime)) }}</p>
    <span>
        <button 
        type="button" 
        class="bg-gray-800 text-xs text-white p-1.5 px-2 border border-white rounded-md dark:bg-gray-900 mr-1" 
        wire:click ="editDate({{ $lead->id }})"
        > 
        {{__('leads.update')}}
        </button> 
    </span>
</div>