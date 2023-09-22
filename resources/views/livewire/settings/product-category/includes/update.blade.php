<div>
    <form>
        <input type="hidden" 
        wire:model='editingCategoryId' 
        name='editingCategoryId' 
        id="editingCategoryId" 
        >
        <div class="w-full mb-4 ">
            <label for="category" class="">{{__('settings.form_category')}}<span class="text-red-600"> (*)</span></label>
            <input type="text" 
            wire:model='editingCategoryCategory' 
            name='editingCategoryCategory' 
            id="editingCategoryCategory"  
            class="block mt-2 w-full border-gray-300 rounded-md dark:text-black"           
            required >
            @error('editingCategoryCategory') 
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
