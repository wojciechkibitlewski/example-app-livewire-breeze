<div>
<div class="bg-white rounded-xl p-4 dark:bg-gray-800 mt-6">
    <div class="flex flex-row justify-between mb-4">
        <div class="flex flex-row items-center">
            <div class="block mt-2 border p-2 border-gray-300 rounded-l-md border-r-0 dark:bg-gray-300 dark:text-black">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </div>
            <input type="text" placeholder="{{__('products.form_search')}}"
            class="block mt-2 w-full border-gray-300 border-l-0 rounded-r-md dark:bg-gray-300 dark:text-black" 
            id="search"
            wire:model.live.debounce.300ms="search" 
            />
        </div>
        <div class="flex flex-row items-center">
            <div class="hidden md:inline-block mr-2 mt-2 ">{{__('products.form_perpage')}}</div> 
            <select
            wire:model.live="perPage" 
            id="per_page" name="per_page" 
            class="border-gray-300 rounded-md mt-2 dark:bg-gray-300 dark:text-black" 
            >
                <option value="5">5</option>
                <option value="10">10</option> 
                <option value="20">20</option> 
                <option value="50">50</option> 
            </select>
        </div>
    </div>
    <div class="w-full overflow-x-auto mb-[20px]" id="leadsTable">
    <table class="text-left text-sm font-normal mb-4 w-full">
        <thead class="border-b text-xs text-gray-400 bg-gray-100 
        dark:bg-gray-600 dark:text-gray-100 dark:border-neutral-500">
            <tr>
                <th scope="col" class="px-2 py-2 font-light">{{__('leads.table_date')}}</th>
                <th scope="col" class="px-2 py-2 font-light">{{__('leads.table_title')}}</th>
                <th scope="col" class="px-2 py-2 font-light">{{__('leads.table_client')}}</th>
                <th scope="col" class="px-2 py-2 font-light">{{__('leads.table_price')}}</th>
                <th scope="col" class="px-2 py-2 font-light">{{__('leads.table_adv')}}</th>
                <th scope="col" class="px-2 py-2 font-light">{{__('leads.table_state')}}</th>
                <th scope="col" class="px-2 py-2 font-light">{{__('leads.table_created_at')}}</th>
                <th scope="col" class="px-2 py-2 font-light">{{__('leads.table_action')}}</th>
            </tr>
        </thead>
        <tbody>
            @if(count($leads)==0)
                <tr 
                    class="border-b transition duration-300 ease-in-out 
                    hover:bg-gray-200 dark:border-neutral-500 dark:hover:bg-neutral-600">
                    <td colspan="8" class="whitespace-nowrap px-2 py-2 text-center">{{__('reports.no_data')}}</td>
                </tr>
            @endif
            @foreach ($leads as $item)
                <tr id="{{ $item->prefix }}" wire:key="{{ $item->prefix }}"
                class="border-b transition duration-300 ease-in-out 
                hover:bg-gray-200 dark:border-neutral-500 dark:hover:bg-neutral-600">
                    <td class="whitespace-nowrap px-2 py-2">{{ $item->executionDate }}</td>
                    <td class="whitespace-nowrap px-2 py-2">{{ $item->title }}</td>
                    <td class="whitespace-nowrap px-2 py-2"><a href="{{route('clients.show',$item->client_prefix)}}" class="underline" title="">{{ getClientName($item->client_id) }}</a></td>
                    <td class="whitespace-nowrap px-2 py-2">{{ $item->leadValue }} zł</td>
                    <td class="whitespace-nowrap px-2 py-2">{{ $item->advanceValue }} zł</td>
                    <td class="whitespace-nowrap px-2 py-2">{{ getStateName($item->type_id) }}</td>
                    <td class="whitespace-nowrap px-2 py-2">{{ date("Y-m-d", strtotime($item->created_at)) }}</td>

                    <td class="whitespace-nowrap px-2 py-2 flex flex-row">
                        <div class="p-1">
                            <a 
                            class="bg-gray-800 text-xs text-white p-1.5 px-2 border border-white rounded-md dark:bg-gray-900 mr-1" 
                            href="{{ route('leads.show',$item->prefix) }}">{{__('leads.show')}}</a>
                        </div>
                        
                        </div>
                    </td>

                </tr>
            @endforeach

                
            </tbody>
    </table>

    </div>
    {!! $leads->links() !!}
</div>
</div>