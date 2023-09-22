<div>
    <form>
        <input type="hidden" 
        wire:model='editingSourceId' 
        name='editingSourceId' 
        id="editingSourceId" 
        >
        <!--Category -->
        <div class="w-full mb-4 ">
            <label for="source" class="">{{__('settings.form_source')}}<span class="text-red-600"> (*)</span></label>
            <input type="text" 
            wire:model='editingSourceSource' 
            name='editingSourceSource' 
            id="editingSourceSource"  
            class="block mt-2 w-full border-gray-300 rounded-md dark:text-black"           
            required >
            @error('selectedSourceSource') 
                <span class="text-red-500 text-xs mt-3 block ">{{$message}}</span>
            @enderror
        </div>                   
        <!--Submit button-->
        <x-button
        type="submit"
        wire:click.prevent="update"
        >
        {{__('settings.edit_source')}}
        </x-button>
    </form>
</div>
