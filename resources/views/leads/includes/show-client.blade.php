<p class="uppercase text-xs text-gray-400">{{__('leads.table_client')}}</p>
<div class="flex flex-row justify-between items-center	">
    <p class="text-2xl">{{$client->name}}</p>
    <span>
        <a href="{{ route('clients.show', $client->prefix) }}" 
        class="bg-gray-800 text-xs text-white p-1.5 px-2 border border-white rounded-md dark:bg-gray-900 mr-1" 
        > {{__('leads.show')}} </a>
    </span>
</div>
<div class="mb-4">
    <a href="mailto:{{$client->email}}" title="" class="text-blue-600 underline text-normal">{{$client->email}}</a><br/>
    <a href="tel:{{ $client->phone }}" title="" class="text-blue-600 underline text-normal">{{ $client->phone }}</a><br/>
    <a href="{{$client->social}}" target="_blank" title="" class="text-blue-600 underline text-normal">{{$client->social}}</a><br/>
    <p class="font-bold text-normal">{{$client->firm}}</p>
</div>