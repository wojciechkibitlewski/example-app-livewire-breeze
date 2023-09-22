<div>
    <form>
        <input type="hidden" 
        wire:model='editingTypeId' 
        name='editingTypeId' 
        id="editingTypeId" 
        >
        <div class="w-full mb-4 ">
            <label for="editingTypeType" class="">{{__('settings.form_type')}}<span class="text-red-600"> (*)</span></label>
            <input type="text" 
            wire:model='editingTypeType' 
            name='editingTypeType' 
            id="editingTypeType"  
            class="block mt-2 w-full border-gray-300 rounded-md dark:text-black"           
            required >
            @error('editingTypeType') 
                <span class="text-red-500 text-xs mt-3 block ">{{$message}}</span>
            @enderror
        </div>   
        <div class="w-full mb-4 ">
            <label for="editingTypeOrder" class="">{{__('settings.form_order')}}<span class="text-red-600"> (*)</span></label>
            <input type="text" 
            wire:model='editingTypeOrder' 
            name='editingTypeOrder' 
            id="editingTypeOrder"  
            class="block mt-2 w-full border-gray-300 rounded-md dark:text-black"           
            required >
            @error('editingTypeOrder') 
                <span class="text-red-500 text-xs mt-3 block ">{{$message}}</span>
            @enderror
        </div>                   
        <!--Submit button-->
        <x-button
        type="submit"
        wire:click.prevent="update"
        >
        {{__('settings.form_edit')}}
        </x-button>
    </form>
</div>
