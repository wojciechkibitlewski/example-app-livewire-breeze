<div class="md:flex md:flex-row border-b border-gray-200 dark:border-gray-600 w-full 2xl:w-[90%]">
    <div class="w-full md:basis-1/2 md:border-r md:border-gray-200 dark:border-gray-600">
        <!-- date and time  -->
        <div class="w-full border-b border-gray-200 dark:border-gray-600 p-4">
            @include('leads.includes.show-date')
        </div>
        <!-- state  -->
        <div class="w-full border-b border-gray-200 dark:border-gray-600 p-4">
            @include('leads.includes.show-state')
        </div>
        <!-- source  -->
        <div class="w-full border-b border-gray-200 dark:border-gray-600 p-4">
            @include('leads.includes.show-source')
        </div> 
        <!-- client  -->
        <div class="w-full border-b border-gray-200 dark:border-gray-600 p-4">  
            @include('leads.includes.show-client')
        </div> 
        <!-- date  -->
        <div class="w-full border-b border-gray-200 dark:border-gray-600 p-4">  
            @include('leads.includes.show-created')
        </div> 
        <div class="w-full border-b border-gray-200 dark:border-gray-600 p-4">  
            @include('leads.includes.show-updated')
        </div> 
    </div>
    <div class="md:basis-1/2 md:border-r md:border-gray-200 dark:border-gray-600">
        <!-- lead value  -->
        <div class="w-full border-b border-gray-200 dark:border-gray-600 p-4">
            @include('leads.includes.show-leadvalue')
        </div> 
        <!-- products  -->
        <div class="w-full border-b border-gray-200 dark:border-gray-600 p-4">
            @include('leads.includes.show-products')
        </div>
        <!-- note  -->
        <div class="w-full border-b border-gray-200 dark:border-gray-600 p-4">
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
                    data-te-toggle="modal"
                    data-te-target="#deleteLeadsModal"
                    > {{__('leads.delete_lead')}}  </button>  
                </span>
            </div> 
        
        </div>
    </div>
</div>