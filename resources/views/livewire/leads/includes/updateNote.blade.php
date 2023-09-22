<div>
    <form>
        <input type="hidden" 
        wire:model='editingLeadId' 
        name='editingLeadId' 
        id="editingLeadId" 
        >
        <div class="mb-4">
            <label for="editingNote" class="">{{__('leads.note')}}</label>
            <textarea id="editingNote" 
            class="block mt-2 w-full border-gray-300 rounded-md dark:text-black" 
            name="editingNote" wire:model='editingNote'></textarea>
            @error('note')
                <div class="mt-2 p-2 rounded bg-red-400">{{ $message }}</div>
            @enderror 
        </div>
                          
        <!--Submit button-->
        <x-button
        type="submit"
        wire:click.prevent="updateNote"
        >
        {{__('leads.update')}}
        </x-button>
    </form>
</div>
