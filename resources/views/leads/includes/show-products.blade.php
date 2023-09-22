<table class="w-full my-4 text-left bg-white rounded-md" id="productsTable">
    <thead class="border-b text-xs text-gray-400 bg-gray-200 
        dark:bg-gray-600 dark:text-gray-100 dark:border-neutral-500" >
        <tr class="">
            <th class="p-2 font-thin" scope="col">{{__('leads.product')}}</th>
            <th class="p-2 font-thin" scope="col">{{__('leads.quant')}}</th>
            <th class="p-2 font-thin" scope="col">{{__('leads.price')}}</th>
            <th class="p-2 font-thin" scope="col">{{__('leads.table_action')}}</th>
        </tr>
    </thead>
    <tbody>
        @if(count($leadProduct)==0)
        <tr class="border-b border-gray-200 bg-white">
                <td colspan="4" class="p-2 ">{{__('reports.no_data')}}</td>
        </tr>
        @else 
        @foreach($leadProduct as $item)
            <tr class="border-b border-gray-200 bg-white">
                <td class="p-2 ">
                    {{ getProductName($item->product_id) }}
                </td>
                <td class="p-2 ">
                    {{$item->quant}}
                </td>
                <td class="p-2 ">
                    {{$item->product_price}}
                </td>
                <td class="py-2 lg:p-2 ">
                    <button 
                    type="button"
                    class="text-blue-600 px-2"
                    id="deleteRowButton_{{ $item->id }}"
                    wire:click ="deleteProduct({{ $item->id }}, {{ $lead->id }})"
                    > 
                    {{__('leads.delete')}} 
                    </button> 
                    
                </td>
            </tr>
        @endforeach
        @endif
            <tr class="">
                <td class="px-2" colspan="4">
                    <button
                    type="button"
                    class="w-full block rounded-md my-6 py-2 items-center text-center font-semibold  text-sm border bg-orange-600 dark:bg-orange-900 border-orange-600 text-gray-100 dark:text-gray-100 hover:bg-orange-700 dark:hover:bg-orange-700"
                    wire:click ="addProduct( {{ $lead->id }})"
                    > 
                        {{__('leads.add_product_tab')}}
                    </button> 
                </td>
            </tr>
    </tbody>
</table>