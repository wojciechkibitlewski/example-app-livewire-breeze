<div class="flex flex-row w-full">
    <div class="w-[50%] md:w-[40%] p-2 text-center md:text-left">
        <div class="mb-4">
            <p class="uppercase text-xs text-gray-400">{{__('leads.leads_value')}}</p>
        </div> 
        <div class="mb-4">
            <p class="text-2xl">{{$lead->leadValue}} zł</p>
        </div> 
    </div>
    <div class="w-[50%] md:w-[60%] text-center md:text-left p-2 {{$lead->leadValue > $lead->advanceValue ? 'bg-red-300 dark:bg-red-700 rounded-xl':''}}">
        <div class="mb-4">
            <p class="uppercase text-xs {{$lead->leadValue > $lead->advanceValue ? 'text-white ':'text-gray-400 '}}">{{__('leads.table_adv')}}</p>
        </div> 
        <div class="md:flex md:flex-row justify-between mb-4 ">
            <p class="text-2xl">{{$lead->advanceValue}} zł</p>
            <span>
                <button 
                class="bg-gray-800 text-xs text-white p-1.5 px-2 border border-white rounded-md dark:bg-gray-900 mr-1" 
                wire:click ="editPayment({{ $lead->id }})"
                > {{__('leads.add_payment')}} </button>  
            </span>
        </div> 
    </div>
</div>