<div>
    <div class="mt-8 p-6">
        <div class="md:flex md:flex-row justify-between">
            <h2 class="text-3xl font-bold mb-4">{{__('products.products')}}</h2>
            <a 
            class="w-full block md:inline md:w-auto rounded-md p-2 px-6 pt-3 text-center font-semibold border bg-orange-600 dark:bg-orange-900 border-orange-600 text-gray-100 dark:text-gray-100 hover:bg-orange-700 dark:hover:bg-orange-700" 
                href="{{route('products.create')}}"
                title="{{__('dashboard.add')}}"
                >{{__('dashboard.add')}}</a>
        </div>
        @include('includes.message')
        @include('livewire.products.includes.table')
           
    </div>
    
    <x-a-modal key:wire="removeProduct" name="removeProduct" title="{{__('products.delete_product')}}">
        <x-slot:body>
        @include('livewire.products.includes.delete')
        </x-slot>
    </x-a-modal>
</div>