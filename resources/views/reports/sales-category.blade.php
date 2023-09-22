<x-app-layout>
    <x-a-header>
        <div></div>
        <x-a-title-header title="{{__('reports.reports')}}" />
    </x-a-header>

    <div class="relative min-h-screen p-6">
        <div class="md:flex md:flex-row justify-between my-6">
                <h2 class="text-3xl font-bold mb-4">{{__('reports.sales_category')}}</h2>
                <button 
                    class="w-full md:inline md:w-auto rounded-md p-2 px-6 text-center font-semibold border bg-orange-600 dark:bg-orange-900 border-orange-600 text-gray-100 dark:text-gray-100 hover:bg-orange-700 dark:hover:bg-orange-700" 
                    type="button"
                    x-data
                    x-on:click = "$dispatch('open-modal',{name:'selectReports'})"
                    >
                    {{__('reports.select_report')}}
                </button>
            </div>
        @include('includes.message')

        @livewire('sales.sales-in-category')       

    </div>

    <x-a-modal key:wire="selectReports" name="selectReports" title="{{__('reports.select_report')}}">
        <x-slot:body>
        @include('reports.includes.selectReports')
        </x-slot>
    </x-a-modal>

</x-app-layout>
