<div class="w-full overflow-x-auto mb-[20px] mt-4">
<table class="text-left text-sm font-normal mb-4 w-full">
        <thead class="border-b text-xs bg-gray-100 dark:border-neutral-500">
            <tr>
                <th scope="col" class="px-2 py-2 font-light text-gray-400">{{__('leads.table_date')}}</th>
                <th scope="col" class="px-2 py-2 font-light text-gray-400">{{__('leads.table_title')}}</th>
                <th scope="col" class="px-2 py-2 font-light text-gray-400">{{__('leads.table_price')}}</th>
                <th scope="col" class="px-2 py-2 font-light text-gray-400">{{__('leads.table_adv')}}</th>
                <th scope="col" class="px-2 py-2 font-light text-gray-400">{{__('leads.table_state')}}</th>
                <th scope="col" class="px-2 py-2 font-light text-gray-400">{{__('leads.table_action')}}</th>
            </tr>
        </thead>
        <tbody>
            @if(count($leads) == 0)
            <tr
                class="border-b transition duration-300 ease-in-out 
                hover:bg-gray-200 dark:border-neutral-500 dark:hover:bg-neutral-600">
                <td colspan="6" class="whitespace-nowrap px-2 py-2">{{__('reports.no_data')}}</td>
            </tr>
            @else
            @foreach ($leads as $item)
                <tr
                class="border-b transition duration-300 ease-in-out 
                hover:bg-gray-200 dark:border-neutral-500 dark:hover:bg-neutral-600">
                    <td class="whitespace-nowrap px-2 py-2">{{ $item->executionDate }}</td>
                    <td class="whitespace-nowrap px-2 py-2">{{ $item->title }}</td>
                    <td class="whitespace-nowrap px-2 py-2">{{ $item->leadValue }} zł</td>
                    <td class="whitespace-nowrap px-2 py-2">{{ $item->advanceValue }} zł</td>
                    <td class="whitespace-nowrap px-2 py-2">{{ getStateName($item->type_id) }}</td>
                    <td class="whitespace-nowrap px-2 py-2 flex flex-row">
                        <div class="p-1">
                            <a 
                            class="bg-purple-200 p-1 px-2 border border-white rounded-md dark:bg-purple-900" 
                            href="{{ route('leads.show',$item->prefix) }}">{{__('leads.show')}}</a>
                        </div>
                        
                        </div>
                    </td>

                </tr>
            @endforeach
            @endif
                
            </tbody>
    </table>
</div>