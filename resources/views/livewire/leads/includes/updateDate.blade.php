<div>
    <form>
        <input type="hidden" 
        wire:model='editingLeadId' 
        name='editingLeadId' 
        id="editingLeadId" 
        >
        <div class="md:flex md:flex-row mb-4">
            <div class="w-full md:w-[50%] md:mr-4 mb-4 ">
                <label for="editingExecutionDate" class="">{{__('leads.date')}}<span class="text-red-600"> (*)</span></label>
                <input type="date" 
                wire:model='editingExecutionDate'
                name="editingExecutionDate" 
                id="editingExecutionDate" 
                class="block mt-2 w-full border-gray-300 rounded-md dark:text-black" 
                required
                /> 
                @error('editingExecutionDate') 
                    <span class="text-red-500 text-xs mt-3 block ">{{$message}}</span>
                @enderror
            </div> 
            <div class="relative w-full md:w-[50%] " 
            id="time"
            data-te-format24="true"
            >
                <label for="editingExecutionTime" class="block mb-2 w-full">{{__('leads.time')}}</label>
                <input type="text"
                class="peer block mt-1 w-full rounded-md bg-transparent 
                pt-2 bg-white border-gray-300
                outline-none transition-all duration-200 ease-linear 
                focus:placeholder:opacity-100 peer-focus:text-primary 
                data-[te-input-state-active]:placeholder:opacity-100 
                motion-reduce:transition-none 
                dark:text-black dark:placeholder:text-black dark:peer-focus:text-black [&:not([data-te-input-placeholder-active])]:placeholder:opacity-100"
                id="editingExecutionTime" 
                name="editingExecutionTime" 
                wire:model='editingExecutionTime'
                data-te-toggle="timepicker"/>
                @error('editingEecutionTime')
                    <div class="mt-2 p-2 rounded bg-red-400">{{ $message }}</div>
                @enderror  
            </div> 
        </div>   
                          
        <!--Submit button-->
        <x-button
        type="submit"
        wire:click.prevent="updateDate"
        >
        {{__('leads.update')}}
        </x-button>
    </form>
</div>
