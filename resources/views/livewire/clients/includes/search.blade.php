<div>
    
        <div class="mb-4">
            <label for="name" class="">{{__('leads.client_name')}}</label>
            
            <input id="name" type="text" name="name" 
            class="block mt-2 w-full border-gray-300 rounded-md
            dark:text-black" 
            wire:model="search" wire:keyup="searchResult"
             />

            @if($showresult)
            <ul class="w-full bg-white border rounded" >
                @if(!empty($records))
                    @foreach($records as $record)
                    <li class="p-4 cursor-pointer" wire:click="fetchClientDetail({{ $record->id }})">{{ $record->name}}</li>
                    @endforeach
                @endif
            </ul>
            @endif
            <div class="clear"></div>
             
        </div>
                          
        <!--Submit button-->
        <x-button
        type="buttom"
        wire:click.prevent="searchClient"
        >
        {{__('dashboard.add')}}
        </x-button>
   
</div>
