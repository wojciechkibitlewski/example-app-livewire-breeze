<div>
    <div class="md:flex md:flex-row mt-8 ">
        <div class="basis-2/3 p-6">
            
            <div class="md:flex md:flex-row justify-between">
                <div>
                    <h2 class="text-3xl font-bold mb-4">{{__('settings.type')}}</h2>
                    <p></p>
                </div>
                <button 
                    class="w-full md:inline md:w-auto rounded-md p-2 px-6 text-center font-semibold border bg-orange-600 dark:bg-orange-900 border-orange-600 text-gray-100 dark:text-gray-100 hover:bg-orange-700 dark:hover:bg-orange-700" 
                    type="button"
                    x-data
                    x-on:click = "$dispatch('open-modal',{name:'addType'})"
                    >
                    {{__('dashboard.add')}}
                </button>
            </div>
            <p class="my-2">{{__('dashboard.task_04_a')}}</p>

            @include('includes.message')
            @include('livewire.settings.sales-type.includes.table')
            
            
        </div>
        <div class="basis-1/3 p-6">
        </div>
        
    </div>
    <x-a-modal key:wire="addType" name="addType" title="{{__('settings.add_type')}}">
        <x-slot:body>
        @include('livewire.settings.sales-type.includes.create')
        </x-slot>
    </x-a-modal>
    <x-a-modal key:wire="editType" name="editType" title="{{__('settings.type_edit')}}">
        <x-slot:body>
        @include('livewire.settings.sales-type.includes.update')
        </x-slot>
    </x-a-modal>
    <x-a-modal key:wire="removeType" name="removeType" title="{{__('settings.type_delete')}}">
        <x-slot:body>
        @include('livewire.settings.sales-type.includes.delete')
        </x-slot>
    </x-a-modal>
</div>