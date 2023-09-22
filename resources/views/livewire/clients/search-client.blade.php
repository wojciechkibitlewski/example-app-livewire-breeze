<div>
    <div class="mb-4">
        <label for="client_name" class="">{{__('leads.client_name')}}<span class="text-red-600"> (*)</label>
        <div class="flex flex-row">
            <input id="client_name" type="text" 
            class="block mt-2 w-full border-gray-300 border-r-0 rounded-l-md dark:text-black" 
            name="client_name" 
            value="{{ !empty($clientDetails) ? $clientDetails->name : old('client_name') }}"  
            required />   
            <button type="button" 
            class="p-1 border border-gray-300 border-l-0 rounded-r-md mt-2"
            wire:click = "searchModal"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607zM10.5 7.5v6m3-3h-6" />
                </svg>
            </button>
            
        </div>  
        @error('client_name')
            <div class="mt-2 p-2 rounded bg-red-400">{{ $message }}</div>
        @enderror   
    </div>
    <!--mail -->   
    <div class="mb-4">
        <label for="client_email" class="">{{__('leads.client_email')}}</label>
        <input type="hidden" name="client_id" value="{{ !empty($clientDetails) ? $clientDetails->id : '' }}" />

        <input id="client_email" type="email" 
        class="block mt-2 w-full border-gray-300 rounded-md dark:text-black" 
        name="client_email" value="{{ !empty($clientDetails) ? $clientDetails->email : old('client_email') }}" 
        />
        @error('client_name')
            <div class="mt-2 p-2 rounded bg-red-400">{{ $message }}</div>
        @enderror  
    </div>

    <!--phone -->
    <div class="mb-4">
        <label for="client_phone" class="">{{__('leads.client_phone')}}</label>
        <input id="client_phone" type="text" 
        class="block mt-2 w-full border-gray-300 rounded-md dark:text-black" 
        name="client_phone" value="{{ !empty($clientDetails) ? $clientDetails->phone : old('client_phone') }}" 
        />
        @error('client_phone')
            <div class="mt-2 p-2 rounded bg-red-400">{{ $message }}</div>
        @enderror  
    </div>
    <!--social -->
    <div class="mb-4">
        <label for="client_social" class="">{{__('leads.client_social')}}</label>
        <input id="client_social" type="text" 
        class="block mt-2 w-full border-gray-300 rounded-md dark:text-black" 
        name="client_social" value="{{ !empty($clientDetails) ? $clientDetails->social : old('client_social') }}" 
        />
        @error('client_social')
            <div class="mt-2 p-2 rounded bg-red-400">{{ $message }}</div>
        @enderror  
    </div>
    <!--firm -->
    <div class="mb-4">
        <label for="client_firm" class="">{{__('leads.client_firm')}}</label>
        <input id="client_firm" type="text" 
        class="block mt-2 w-full border-gray-300 rounded-md dark:text-black" 
        name="client_firm" value="{{ !empty($clientDetails) ? $clientDetails->firm : old('client_firm') }}" 
        />
        @error('client_firm')
            <div class="mt-2 p-2 rounded bg-red-400">{{ $message }}</div>
        @enderror 
    </div>
    <!--note -->
    <div class="mb-4">
        <label for="client_note" class="">{{__('leads.client_note')}}</label>
        <textarea id="client_note" class="block mt-1 rounded-md w-full border-gray-300" rows="13"
        name="client_note">{{ !empty($clientDetails) ? $clientDetails->note : old('client_note') }}</textarea>
        @error('client_note')
            <div class="mt-2 p-2 rounded bg-red-400">{{ $message }}</div>
        @enderror 
    </div>
    
    <x-a-modal key:wire="searchModal" name="searchModal" title="{{__('products.form_search')}}">
        <x-slot:body>
        @include('livewire.clients.includes.search')
        </x-slot>
    </x-a-modal>
</div>