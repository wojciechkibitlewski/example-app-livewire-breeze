<div>
    <div class="mt-8 p-6">
        <div class="md:flex md:flex-row justify-between">
            <h2 class="text-3xl font-bold mb-4">{{__('leads.leads')}}</h2>
            <div>
                <button
                class="w-full block md:inline md:w-auto rounded-md p-2 px-6 pb-1.5 mr-2 mb-2 text-center font-semibold border bg-neutral-600 dark:bg-neutral-900 border-white text-gray-100 dark:text-gray-100 hover:bg-orange-700 dark:hover:bg-orange-700" 
                wire:click ="showCriteria"

                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                    class="w-6 h-6 inline ">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                    {{__('leads.criteria')}}
                </button>
                <a 
                class="w-full block md:inline md:w-auto rounded-md p-2 px-6 pt-3 text-center font-semibold border bg-orange-600 dark:bg-orange-900 border-orange-600 text-gray-100 dark:text-gray-100 hover:bg-orange-700 dark:hover:bg-orange-700" 
                    href="{{route('leads.create')}}"
                    title="{{__('leads.add_lead')}}"
                    >{{__('leads.add_lead')}}</a>
            </div>
        </div>
        @include('includes.message')
        @include('livewire.leads.includes.criteria')
        @include('livewire.leads.includes.table')
           
    </div>
    
    <x-a-modal key:wire="showCriteria" name="showCriteria" title="{{__('leads.criteria')}}">
        <x-slot:body>
        @include('livewire.leads.includes.searchForm')
        </x-slot>
    </x-a-modal>
</div>