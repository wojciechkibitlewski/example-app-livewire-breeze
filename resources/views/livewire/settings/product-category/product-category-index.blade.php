<div>
    <div class="md:flex md:flex-row mt-8 ">
        <div class="basis-2/3 p-6">
            
            <div class="md:flex md:flex-row justify-between">
                <h2 class="text-3xl font-bold mb-4">{{__('settings.category')}}</h2>
                <button 
                    class="w-full md:inline md:w-auto rounded-md p-2 px-6 text-center font-semibold border 
                    bg-orange-600 dark:bg-orange-900 border-orange-600 text-gray-100 dark:text-gray-100 hover:bg-orange-700 dark:hover:bg-orange-700" 
                    type="button"
                    x-data
                    x-on:click = "$dispatch('open-modal',{name:'addCategory'})"
                    >
                    {{__('dashboard.add')}}
                </button>
            </div>
            <p class="my-2"><b>{{__('dashboard.task_02')}}.</b> {{__('dashboard.task_02_a')}}</p>

            @include('includes.message')
            @include('livewire.settings.product-category.includes.table')
            
            
        </div>
        <div class="basis-1/3 p-6">
        </div>
        
    </div>
    <x-a-modal key:wire="addCategory" name="addCategory" title="{{__('settings.add_category')}}">
        <x-slot:body>
        @include('livewire.settings.product-category.includes.create')
        </x-slot>
    </x-a-modal>
    <x-a-modal key:wire="editCategory" name="editCategory" title="{{__('settings.category_edit')}}">
        <x-slot:body>
        @include('livewire.settings.product-category.includes.update')
        </x-slot>
    </x-a-modal>
    <x-a-modal key:wire="removeCategory" name="removeCategory" title="{{__('settings.category_delete')}}">
        <x-slot:body>
        @include('livewire.settings.product-category.includes.delete')
        </x-slot>
    </x-a-modal>
</div>