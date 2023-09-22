<div class="bg-white rounded-xl p-4 dark:bg-gray-800 col-span-2 mb-4 ">
    <p class="text-xs text-gray-400 uppercase">{{__('dashboard.this_month')}}:</p>
    <h3 class="font-medium text-lg ">{{__('dashboard.clients')}}</h3>
    <div class="grid grid-cols-3 lg:grid-cols-4 mt-4">
        @foreach ($clients as $item)
                <div class="border-b border-gray-300 py-1">{{$item->name}}</div>
                <div class="border-b border-gray-300 py-1">
                    <a href="tel:{{$item->phone}}" title="Phone" class="underline">{{$item->phone}}</a>
                </div>
                <div class="hidden lg:inline border-b border-gray-300 py-1">
                    <a href="mailto:{{$item->email}}" title="E-mail" class="underline">{{$item->email}}</a>
                </div>
                <div class="border-b border-gray-300 py-2 text-right">
                    <a class="bg-sky-200 p-1 px-2 border border-white rounded-md dark:bg-sky-900" href="{{ route('clients.show',$item->client_id) }}">{{__('dashboard.show')}}</a>
                </div>
        @endforeach
    </div>
</div>