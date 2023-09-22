<div>
@include('includes.message')

<div class="md:flex md:flex-row border-b border-gray-200 dark:border-gray-600 w-full 2xl:w-[90%]">
    <div class="w-full md:basis-1/2 md:border-r md:border-gray-200 dark:border-gray-600">
        <!-- date and time  -->
        <div class="w-full border-b border-gray-200 dark:border-gray-600 py-4 md:pr-4">
            @include('leads.includes.show-date')
        </div>
        <!-- state  -->
        <div class="w-full border-b border-gray-200 dark:border-gray-600 py-4 md:pr-4">
            @include('leads.includes.show-state')
        </div>
        <!-- source  -->
        <div class="w-full border-b border-gray-200 dark:border-gray-600 py-4 md:pr-4">
            @include('leads.includes.show-source')
        </div> 
        <!-- client  -->
        <div class="w-full border-b border-gray-200 dark:border-gray-600 py-4 md:pr-4">  
            @include('leads.includes.show-client')
        </div> 
        <!-- date  -->
        <div class="w-full border-b border-gray-200 dark:border-gray-600 py-4 md:pr-4">  
            @include('leads.includes.show-created')
        </div> 
        <div class="w-full border-b border-gray-200 dark:border-gray-600 py-4 md:pr-4">  
            @include('leads.includes.show-updated')
        </div> 
    </div>
    <div class="md:basis-1/2 md:border-r md:border-gray-200 dark:border-gray-600">
        <!-- lead value  -->
        <div class="w-full border-b border-gray-200 dark:border-gray-600 py-4 md:px-4">
            @include('leads.includes.show-leadvalue')
        </div> 
        <!-- products  -->
        <div class="w-full border-b border-gray-200 dark:border-gray-600 py-4 md:px-4">
            @include('leads.includes.show-products')
        </div>
        <!-- note  -->
        <div class="w-full border-b border-gray-200 dark:border-gray-600 py-4 md:px-4">
            @include('leads.includes.show-note')
        </div>
        <!-- delete leads  -->
        <div class="w-full border-b border-gray-200 dark:border-gray-600 p-4 text-right">
            <div class="flex flex-row w-full justify-between items-center	">
                <p class="text-2xl"></p>
                <span>
                    <button 
                    type="button" 
                    class="text-sm bg-red-600 text-white rounded px-4 py-2"
                    wire:click.prevent="deleteLead({{$lead->id}})"
                    > {{__('leads.delete_lead')}}  </button>  
                </span>
            </div> 
        
        </div>
    </div>


    <x-a-modal key:wire="editDate" name="editDate" title="{{__('leads.date')}}">
        <x-slot:body>
        @include('livewire.leads.includes.updateDate')
        </x-slot>
    </x-a-modal>
    <x-a-modal key:wire="editState" name="editState" title="{{__('leads.state')}}">
        <x-slot:body>
        @include('livewire.leads.includes.updateState')
        </x-slot>
    </x-a-modal>
    <x-a-modal key:wire="editNote" name="editNote" title="{{__('leads.note')}}">
        <x-slot:body>
        @include('livewire.leads.includes.updateNote')
        </x-slot>
    </x-a-modal>
    <x-a-modal key:wire="editPayment" name="editPayment" title="{{__('leads.add_payment')}}">
        <x-slot:body>
        @include('livewire.leads.includes.updatePayments')
        </x-slot>
    </x-a-modal>

    <x-a-modal key:wire="deleteProduct" name="deleteProduct" title="{{__('leads.title_delete_product')}}">
        <x-slot:body>
        @include('livewire.leads.includes.deleteProduct')
        </x-slot>
    </x-a-modal>
    <x-a-modal key:wire="addProduct" name="addProduct" title="{{__('leads.add_product_tab')}}">
        <x-slot:body>
        @include('livewire.leads.includes.addProduct')
        </x-slot>
    </x-a-modal>

    <x-a-modal key:wire="deleteLead" name="deleteLead" title="{{__('leads.delete_lead')}}">
        <x-slot:body>
        @include('livewire.leads.includes.deleteLead')
        </x-slot>
    </x-a-modal>

</div>
</div>