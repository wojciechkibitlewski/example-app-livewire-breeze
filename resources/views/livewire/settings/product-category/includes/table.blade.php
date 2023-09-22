<div class="bg-white rounded-xl p-4 dark:bg-neutral-800 mt-6 overflow-x-auto ">
    <table class="text-left font-normal mb-4 w-full">
    <thead class="border-b text-xs text-gray-400 bg-gray-100 
        dark:bg-gray-600 dark:text-gray-100 dark:border-neutral-500">
            <tr>
                <th scope="col" class="px-4 py-2 font-light">{{__('settings.form_category')}}</th>
                <th scope="col" class="px-4 py-2 font-light">{{__('settings.form_action')}}</th>
            </tr>
        </thead>
        <tbody>
            @if(count($categories) == 0)
                <tr class="border-b border-stone-400">
                        <td colspan="2" class="whitespace-nowrap px-4 py-2 text-center">{{__('reports.no_data')}}</td>
                </tr>
            @endif
            @foreach ($categories as $item)
                <tr wire:key="{{$item->id}}" id="{{$item->id}}"
                class="border-b transition duration-300 ease-in-out border-b border-gray-400 border-dashed
                hover:bg-gray-200 dark:border-neutral-500 dark:hover:bg-neutral-600">
                    <td class="whitespace-nowrap px-4 py-2 w-[80%]">
                    {{ $item->category }}
                    </td>
                    <td class="whitespace-nowrap px-4 py-2">
                        
                        <button 
                        class="bg-gray-800 text-xs text-white p-1.5 px-2 border border-white rounded-md dark:bg-gray-900 mr-1" 
                        type="button"
                        wire:click ="edit({{ $item->id }})"
                        >
                        {{__('settings.form_edit')}}
                        </button>
                       
                        <button type="button" 
                        class="bg-red-600 text-xs text-white p-1.5 px-2 border border-white rounded-md dark:bg-red-900" 
                        wire:click ="delete({{ $item->id }})" >{{__('settings.form_delete')}}</buttom>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
    <div class="mt-6">
        {!! $categories->links() !!}
    </div>
</div>