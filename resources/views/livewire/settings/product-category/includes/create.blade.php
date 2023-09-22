<div>
    <form>
        <!--Category -->
        <div class="w-full mb-4 ">
            <label for="category" class="">{{__('settings.form_category')}}<span class="text-red-600"> (*)</span></label>
            <input wire:model='category' type="text" id="category"  
            class="block mt-2 w-full border-gray-300 rounded-md dark:text-black"           
            required autofocus/>
            @error('category') 
                <span class="text-red-500 text-xs mt-3 block ">{{$message}}</span>
            @enderror
        </div>                   
        <!--Submit button-->
        <x-button
        type="submit"
        wire:click.prevent="create"
        >
        {{__('settings.add_category')}}
        </x-button>
    </form>
</div>
