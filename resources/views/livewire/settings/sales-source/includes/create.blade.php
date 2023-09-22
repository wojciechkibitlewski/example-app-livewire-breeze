<div>
    <form>
        <!--Category -->
        <div class="w-full mb-4 ">
            <label for="source" class="">{{__('settings.form_source')}}<span class="text-red-600"> (*)</span></label>
            <input wire:model='source' type="text" id="source"  
            class="block mt-2 w-full border-gray-300 rounded-md dark:text-black"           
            required autofocus/>
            @error('source') 
                <span class="text-red-500 text-xs mt-3 block ">{{$message}}</span>
            @enderror
        </div>                   
        <!--Submit button-->
        <x-button
        type="submit"
        wire:click.prevent="create"
        >
        {{__('settings.add_source')}}
        </x-button>
    </form>
</div>
