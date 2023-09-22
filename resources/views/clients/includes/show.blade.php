<div class="md:flex md:flex-row bg-white rounded-xl p-4 dark:bg-neutral-800 mt-6">

    <div class="md:basis-1/2 p-4 md:border-r md:border-gray-200">
<!-- dane klienta  -->
<div class="mt-4 ">
            <p class="text-gray-400 uppercase text-xs">{{__('clients.name')}}</p>
            <p class="block text-xl font-medium">{{$client->name}}</p>
            
        </div>
        <div class="mt-4 ">
            <p class="text-gray-400 uppercase text-xs">{{__('clients.mail')}}</p>
            <a href="mailto:{{$client->email}}" title="" class="block text-xl font-medium underline">{{$client->email}}</a>
            
        </div>
        <div class="mt-4">
            <p class="text-gray-400 uppercase text-xs">{{__('clients.phone')}}</p>
                <a href="tel:{{$client->phone}}" class="block text-xl font-medium">{{$client->phone}}</a>
        </div>
        <div class="mt-4">
            <p class="text-gray-400 uppercase text-xs">{{__('clients.social')}}</p>
            <a target="_blank" href="{{$client->social}}" title="" class="block text-xl font-medium underline">{{$client->social}}</a>
            </p>
        </div>
        <div class="mt-4">
            <p class="text-gray-400 uppercase text-xs">{{__('clients.firm')}}</p>
                <p class="block text-xl font-medium">{{$client->firm}}
            </p>
        </div>
        <div class="mt-4">
            <p class="text-gray-400 uppercase text-xs" >{{__('clients.note')}}</p>
            
                <p class="block font-normal mt-4">
                    @php 
                    print_r(nl2br($client->note));
                    @endphp
            </p>
        </div>
        <div class="mt-4">
            <p class="text-gray-400 uppercase text-xs">{{__('clients.created_at')}}</p>
                <p class="block text-xl font-medium">{{ date("Y-m-d", strtotime($client->created_at))  }}
            </p>
        </div>
        <div class="mt-4">
            <p class="text-gray-400 uppercase text-xs">{{__('clients.updated_at')}}</p>
                <p class="block text-xl font-medium">{{ date("Y-m-d", strtotime($client->updated_at))  }}
            </p>
        </div>
        <!-- edit client  -->
        <div class="mt-4 w-full border-y border-gray-200 dark:border-gray-600 py-4 ">
            <a  href="{{route('clients.edit',$client->prefix)}}" title="{{__('clients.edit')}}"
            class="block w-full rounded-md p-2 px-6 text-center font-semibold border bg-orange-600 dark:bg-orange-900 border-orange-600 text-gray-100 dark:text-gray-100 hover:bg-orange-700 dark:hover:bg-orange-700"> 
            {{__('clients.edit')}}
            </a>  
            
        </div>
        
    </div>
    <div class="md:basis-2/3 p-4 border-t border-gray-200 md:border-t-0 ">
    <!-- łączna suma wydatków  -->
        <div class="mt-4 ">
            <p class="text-gray-400 uppercase text-xs">{{__('clients.leads-value')}}</p>
            <p class="block text-xl font-medium">{{$leadsValue}} zł</p>
            
        </div>
        <div class="mt-4 ">
            <p class="text-gray-400 uppercase text-xs">{{__('clients.leads-advanceValue')}}</p>
            <p class="block text-xl font-medium">{{$advanceValue}} zł</p>
            
        </div>
    <!-- zamówienia klienta  -->
        <div class="mt-4 ">
            <p class="text-gray-400 uppercase text-xs">{{__('clients.leads')}}</p>
            @include('clients.includes.leads-table')
            
        </div>
    </div>
</div>