<div class="md:flex md:flex-row mt-8">
        <div class="basis-1/3 p-6">
            <h2 class="text-3xl font-bold">{{__('dashboard.dashTitle')}}</h2>
            <p class="mt-6 p-4 bg-stone-300 rounded-xl dark:bg-stone-800">
            <b>{{__('dashboard.dashDescWelcome')}} {{ Auth::user()->name }}</b>.<br/> {{__('dashboard.dashDescWelcome2')}} <br/><br/>
            {{__('dashboard.dashDesc')}}</p>

        </div>
        <div class="basis-2/3 p-6">
            <h2 class="text-3xl font-bold">{{__('dashboard.first_tasks')}}</h2>
            <div class="flex flex-row mt-6">
                <div class="w-40">
                    <p class="text-md ">{{__('dashboard.progress')}}</p>
                    <p class="text-3xl font-bold">{{$progress}}%</p>
                </div>
                <div class="w-40">
                    <p class="text-md ">{{__('dashboard.pending')}}</p>
                    <p class="text-3xl font-bold">
                        {{$tasks}} {{__('dashboard.tasks')}}
                    </p>
                </div>
            </div>

            <div class="w-full border-y border-gray-400 border-dashed mt-6 p-0 pb-2">
                <div class="flex flex-row justify-between items-start ">
                    <div class="items-center py-3 ">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" 
                        class="w-5 h-5 inline {{ count($salessource) == 0 ? 'text-gray-400' : 'text-orange-600' }}">
                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <b>{{__('dashboard.task_01')}}</b>
                        
                    </div>
                    <div class="items-center py-3 mt-2">
                        @if(count( $salessource)== 0)
                        <x-a-link-dashboard href="{{route('settings.salessource.index')}}" title="{{__('dashboard.task_01')}}" >{{__('dashboard.start')}}</x-a-link-dashboard>
                        @endif
                    </div>
                </div>  
                <p class="mr-4">{{__('dashboard.task_01_a')}}</p>
            </div>


            <div class="w-full border-b border-gray-400 border-dashed  p-0 pb-2">
                <div class="flex flex-row justify-between items-start ">
                    <div class="items-center py-3 ">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" 
                        class="w-5 h-5 inline {{ count($productcategory) == 0 ? 'text-gray-400' : 'text-orange-600' }}">
                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <b>{{__('dashboard.task_02')}}</b>
                        

                    </div>
                    <div class="items-center py-3 ">
                        @if(count( $productcategory)== 0)
                        <x-a-link-dashboard href="{{route('settings.productcategory.index')}}" title="" >{{__('dashboard.start')}}</x-a-link-dashboard>
                        @endif
                    </div>
                </div>
                <div class="mr-4">{{__('dashboard.task_02_a')}}</div>
            </div>
            <div class="w-full border-b border-gray-400 border-dashed  p-0 pb-2">
                <div class="flex flex-row justify-between items-center ">
                    <div class="items-center py-3 ">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" 
                        class="w-5 h-5 inline text-gray-400 {{ count($products) == 0 ? 'text-gray-400' : 'text-orange-600' }}">
                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <b>{{__('dashboard.task_03')}}</b>
                        
                    </div>
                    <div class="items-center py-3 ">
                        @if(count( $products)== 0)
                        <x-a-link-dashboard href="{{route('products.create')}}" title="" >{{__('dashboard.start')}}</x-a-link-dashboard>
                        @endif
                    </div>
                    
                </div>
                <div class="">{{__('dashboard.task_03_a')}}</div>
            </div>


        </div>
    </div>