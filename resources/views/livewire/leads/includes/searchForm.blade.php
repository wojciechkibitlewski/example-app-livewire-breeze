<div>
    <form>
        <div class="mb-2">
            <p>{{__('leads.search_date')}}</p>
            <input type="date" class="block mt-2 w-full border-gray-300 rounded-md dark:text-black" 
            name="date_start" value="{{$startDate}}" 
            wire:model ="startDate"
            />
            <input type="date" class="block mt-2 w-full border-gray-300 rounded-md dark:text-black" 
            name="date_end" value="{{$endDate}}" 
            wire:model ="endDate"
            />
        </div>

        <div class="mt-6 ">
            <p>{{__('leads.table_state')}}</p>
            <select
            class="block mt-2 w-full border-gray-300 rounded-md dark:text-black"
            id="type_id" name="type_id" value="{{$type_id}}"
            wire:model ="type_id">   
                <option value="">{{__('leads.state')}}</option>
                @foreach ($types as $item)
                <option value="{{ $item['id'] }}" {{ $type_id == $item['id'] ? 'selected' : '' }}>{{$item['type']}}</option> 
                @endforeach
            </select>
                
        </div>
        <div class="mt-6">
            <p>{{__('leads.table_source')}}</p>
            <select
            class="block mt-2 w-full border-gray-300 rounded-md dark:text-black"
            id="source_id" name="source_id" value="{{$source_id}}"
            wire:model ="source_id">   
                <option value="">{{__('leads.source')}}</option>
                @foreach ($sources as $item)
                <option value="{{$item['id']}}" {{ $source_id == $item['id'] ? 'selected' : '' }} >{{$item['source']}}</option> 
                @endforeach
            </select>
                
        </div>
        <div class="mt-6">
            <p>{{__('leads.table_payment')}}</p>
            <select
            class="block mt-2 w-full border-gray-300 rounded-md dark:text-black"
            id="value" name="value" value="{{$value}}"
            wire:model ="value">   
                <option value="">{{__('leads.select')}}</option>
                <option value="1" {{ $value == 1 ? 'selected' : '' }}>{{__('leads.nopaid')}}</option> 
                <option value="2" {{ $value == 2 ? 'selected' : '' }}>{{__('leads.paid')}}</option> 
            </select>
                
        </div>
                 
        <!--Submit button-->
        <x-button
        type="submit"
        wire:click.prevent="searchLeads"
        >
        {{__('leads.search_leads')}}
        </x-button>
    </form>
</div>
