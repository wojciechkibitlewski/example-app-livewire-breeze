<div  class="text-xs">
    <div class="relative text-xs">
        <div class="">
            <div class="mb-4">
                <label for="selectedProductID" class="block mb-2 w-full">{{__('leads.add_product')}}<span class="text-red-600"> (*)</label></label>
                <select id="selectedProductID" class="block mt-1 w-full border-gray-300 rounded-md" wire:model="selectedProductID">
                    <option value="0">{{__('leads.add_product')}}</option>
                    @foreach ( $products as $item)
                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block mb-2 w-full" for="quant">{{__('leads.quant')}}<span class="text-red-600"> (*)</label></label>
                <input id="quant" type="text" 
                class="block mt-1 border-gray-300 rounded-md mr-4 dark:text-black w-[50%]" 
                name="name" wire:model="quant"
                required />
            </div>
            <div class="">
                <label class="hidden md:block mb-2 w-full" for="buttonAdd"></label>
                <button id="buttonAdd" type="button" wire:click="addProductList"
                class="w-full block sm:inline text-sm text-gray-50 md:text-base p-1 py-2 px-3 bg-gray-600 rounded-md">
                    {{__('leads.add')}}
                </button>
            </div>
        </div>
    </div>
    <div id="nextProdukt" class="mt-8">
        @if($selectedProducts)
           @foreach ($selectedProducts as $index => $product)
            <div class="flex flex-row mb-4" key="{{ $index }}">
                <div class="w-[60%] mr-4">
                    <label  for="product_name_{{ $index }}">{{__('leads.product')}}</label>
                    <input id="product_id_{{ $index }}" type="hidden" name="product_id[]"
                    value="{{ $product['product_id'] }}" />
                    <input id="product_price_{{ $index }}" type="hidden" name="product_price[]"
                    value="{{ $product['product_price'] }}"/>
                    <input id="product_quant_{{ $index }}" type="hidden" name="product_quant[]"
                    value="{{ $product['quant'] }}"/>
                    <input id="product_name_{{ $index }}" type="text" 
                    class="block mt-1 w-full border-gray-300 rounded-md  mr-4 dark:text-black" 
                    readonly name="product_name[]"
                    value="{{ $product['name'] }}"/>
                </div>
                <div class="w-[20%] mr-4">
                    <label for="product_price_{{ $index }}">{{__('leads.value')}}</label>
                    <input id="product_price_{{ $index }}" 
                    class="block mt-1 w-full border-gray-300 rounded-md  mr-4 dark:text-black" 
                    type="text" readonly name="product_value[]"
                    value="{{ $product['productValue'] }}"/>
                </div>
                <div class="w-[20%]">
                    <label for="buttonDelete_{{ $index }}">{{__('leads.table_action')}}</label>
                    <button id="buttonDelete_{{ $index }}" type="button" 
                    class="block w-full sm:inline text-sm text-white md:text-base mt-1 p-1 py-2 px-3 bg-red-600 rounded-md" 
                    wire:click="removeProductModal({{ $index }})">{{__('leads.delete')}}</button>
                </div>
            </div>
            @endforeach
        @else
        <div class="mb-4">
            
        </div>
        @endif
    </div>

    <!--Value -->
    <div class="mb-4">
        <label for="leadValue">{{__('leads.leads_value')}}<span class="text-red-600"> (*)</label></label>
        <input id="leadValue" 
        class="block mt-1 w-[50%] border-gray-300 rounded-md  mr-4 dark:text-black" 
        type="text" name="leadValue"
        wire:model="leadValue" 
        />
    </div>
    
</div>