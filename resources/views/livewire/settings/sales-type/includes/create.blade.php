<div>
    <form>
        <!--Category -->
        <div class="w-full mb-4 ">
            <label for="type" class="">{{__('settings.form_type')}}<span class="text-red-600"> (*)</span></label>
            <input wire:model='type' type="text" id="type"  
            class="block mt-2 w-full border-gray-300 rounded-md dark:text-black"           
            required autofocus/>
            @error('type') 
                <span class="text-red-500 text-xs mt-3 block ">{{$message}}</span>
            @enderror
        </div>
        <div class="w-full mb-4 ">
            <label for="order" class="">{{__('settings.form_order')}} <span class="text-red-600"> (*)</span></label>
            <input wire:model='order' type="text" id="order" 
            class="block mt-2 w-full border-gray-300 rounded-md dark:text-black"           
            required />

        </div>                     
        <!--Submit button-->
        <x-button
        type="submit"
        wire:click.prevent="create"
        >
        {{__('settings.add_type')}}
        </x-button>
    </form>
</div>
