<div>
    <form>
        <input type="hidden" 
        wire:model='editingLeadId' 
        name='editingLeadId' 
        id="editingLeadId" 
        >
        <div class="relative flex-auto p-4">
            <!-- -->
            <label for="editingTypeId" class="block mb-2 w-full">{{__('leads.table_state')}}<span class="text-red-600"> (*)</span></label>
            <select
            wire:model='editingTypeId'
            id="editingTypeId" name="editingTypeId" 
            class="w-full border-gray-300 rounded-md" 
            required 
            >   
            <option value="0">{{__('leads.state')}}</option> 

            @foreach($types as $item)
                <option value="{{$item->id}}" {{ $editingTypeId == $item->id ? 'selected' : ''}}>{{$item->type}}</option> 
            @endforeach
            </select>
            @error('editingTypeId')
                <div class="mt-2 p-2 rounded bg-red-400">{{ $message }}</div>
            @enderror

        </div>
                          
        <!--Submit button-->
        <x-button
        type="submit"
        wire:click.prevent="updateState"
        >
        {{__('leads.update')}}
        </x-button>
    </form>
</div>
