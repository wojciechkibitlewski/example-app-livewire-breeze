<div>
<div class="bg-white rounded-xl p-4 dark:bg-gray-800 mb-4">
    <h1 class="text-2xl">{{__('reports.sales_category')}}</h1>
    <div class="flex flex-row justify-between mb-4">
        <div class="flex flex-row items-center  mr-2 ">
            
        </div>
        <div class="flex flex-row items-center">
            <div class="hidden md:inline-block mr-2 mt-2 ">{{__('reports.select_year')}}</div> 
            <select
            wire:model.live="currentYear" 
            id="currentYear" name="currentYear" 
            class="border-gray-300 rounded-md mt-2 ml-2 dark:bg-gray-300 dark:text-black" 
            >
            @for ($x=2018; $x<2028; $x++)
                <option value="{{$x}}">{{$x}}</option>
            @endfor  
            </select>

            <div class="hidden md:inline-block ml-2 mt-2 ">{{__('reports.select_month')}}</div> 
            <select
            wire:model.live="currentMonth" 
            id="currentMonth" name="currentMonth" 
            class="border-gray-300 rounded-md mt-2 ml-2 dark:bg-gray-300 dark:text-black" 
            >
            <option value="01">{{__('calendar.January')}}</option>
                <option value="02">{{__('calendar.February')}}</option>
                <option value="03">{{__('calendar.March')}}</option>
                <option value="04">{{__('calendar.April')}}</option>
                <option value="05">{{__('calendar.May')}}</option>
                <option value="06">{{__('calendar.June')}}</option>
                <option value="07">{{__('calendar.July')}}</option>
                <option value="08">{{__('calendar.August')}}</option>
                <option value="09">{{__('calendar.September')}}</option>
                <option value="10">{{__('calendar.October')}}</option>
                <option value="11">{{__('calendar.November')}}</option>
                <option value="12">{{__('calendar.December')}}</option>               
            </select>
        </div>
    </div>


    <div class="w-full overflow-x-auto mb-[20px]">
    <table class="text-left text-sm font-normal mb-4 w-full">
        <thead class="border-b text-xs text-gray-400 bg-gray-100 
        dark:bg-gray-600 dark:text-gray-100 dark:border-neutral-500">
            <tr>
                <th scope="col" class="px-2 py-2 font-light">{{__('reports.category')}}</th>
                <th scope="col" class="px-2 py-2 font-light text-right">{{__('reports.value')}}</th>
            </tr>
        </thead>
        <tbody>
            @if(count($leads)==0)
                <tr 
                    class="border-b transition duration-300 ease-in-out 
                    hover:bg-gray-200 dark:border-neutral-500 dark:hover:bg-neutral-600">
                    <td colspan="2" class="whitespace-nowrap px-2 py-2 text-center">{{__('reports.no_data')}}</td>
                </tr>
            @endif
            @foreach ($leads as $item)
                <tr
                class="border-b transition duration-300 ease-in-out 
                hover:bg-gray-200 dark:border-neutral-500 dark:hover:bg-neutral-600">
                    <td class="whitespace-nowrap px-2 py-2">{{ $item->category }}</td>
                    <td class="whitespace-nowrap px-2 py-2 text-right">{{ $item->totalValue }} zł</td>
                </tr>
            @endforeach 
            
            <tr
                class="border-b text-gray-400 bg-gray-100 font-bold
                    dark:bg-gray-600 dark:text-gray-100 dark:border-neutral-500">
                    <td class="whitespace-nowrap px-2 py-2">{{__('reports.sum')}}</td>
                    <td class="whitespace-nowrap px-2 py-2 text-right">{{ $data->sumLeadValue }} zł</td>
                </tr>
            
            </tbody>
    </table>

    </div>
</div>
</div>
