<div>
    <form>
        <input type="hidden" 
        wire:model='editingLeadId' 
        name='editingLeadId' 
        id="editingLeadId" 
        >
        <div class="mb-4">
            <label for="editingAdvanceValue" class="">{{__('leads.table_adv')}}</label>
            <input id="editingAdvanceValue" type="text" 
            class="block mt-2 w-full border-gray-300 rounded-mddark:text-black" 
            name="editingAdvanceValue" wire:model='editingAdvanceValue'
            autofocus />
            @error('editingAdvanceValue')
                <div class="mt-2 p-2 rounded bg-red-400">{{ $message }}</div>
            @enderror

            
        </div>
                          
        <!--Submit button-->
        <x-button
        type="submit"
        wire:click.prevent="updatePayment"
        >
        {{__('leads.update')}}
        </x-button>
    </form>
</div>
