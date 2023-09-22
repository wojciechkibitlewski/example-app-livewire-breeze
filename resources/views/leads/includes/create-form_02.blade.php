<div class="flex flex-row items-center justify-between my-6 text-gray-500 dark:text-gray-100">
    <div class="inline basis-1/3 p-1 px-2 md:p-2 rounded md:rounded-xl">
        <div class="inline-block rounded-full p-1 md:p-2  md:pt-1 mr-2 md:mr-4 h-6 md:h-10 w-6 md:w-10 bg-stone-100 font-bold text-xs md:text-xl text-center">1</div>
        <div class="inline-block text-sm md:text-xl ">{{__('leads.help_1')}}</div>
    </div>
    <div class="inline basis-1/3 p-1 px-2 md:p-2 rounded md:rounded-xl  bg-white dark:bg-stone-500 ">
        <div class="inline-block rounded-full p-1 md:p-2 pb-3 md:pt-1 mr-2 md:mr-4 h-6 md:h-10 w-6 md:w-10 bg-stone-200 font-bold text-xs md:text-xl text-center">2</div>
        <div class="inline-block text-sm md:text-xl ">{{__('leads.help_2')}}</div>
    </div>
    <div class="inline basis-1/3 p-1 px-2 md:p-2 rounded md:rounded-xl ">
        <div class="inline-block rounded-full p-1 md:p-2 pb-3 md:pt-1 mr-2 md:mr-4  h-6 md:h-10 w-6 md:w-10 bg-stone-200 font-bold text-xs md:text-xl text-center">3</div>
        <div class="inline-block text-sm md:text-xl ">{{__('leads.help_3')}}</div>
    </div>
    
</div>

<div class="bg-white rounded-xl p-4 dark:bg-neutral-800 mt-6">
    <form action="{{ route('leads.store-client') }}" method="POST" >
        @csrf
        <input id="lead_prefix" type="hidden" name="lead_prefix" value="{{$lead_prefix}}" />
        @livewire('clients.search-client')
        
        <x-button
            type="submit"
            class="block w-full rounded-md bg-gray-600 py-4 font-medium text-white">
            {{__('leads.save')}} -> {{__('leads.help_h_3')}}
            </x-button>
    </form>
</div>