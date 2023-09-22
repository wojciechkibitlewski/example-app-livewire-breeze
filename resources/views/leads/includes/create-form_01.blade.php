<div class="flex flex-row items-center justify-between my-6 text-gray-500 dark:text-gray-100">
    <div class="inline basis-1/3 p-1 px-2 md:p-2 rounded md:rounded-xl bg-white dark:bg-stone-500 ">
        <div class="inline-block rounded-full p-1 md:p-2  md:pt-1 mr-2 md:mr-4 h-6 md:h-10 w-6 md:w-10 bg-stone-100 font-bold text-xs md:text-xl text-center">1</div>
        <div class="inline-block text-sm md:text-xl ">{{__('leads.help_1')}}</div>
    </div>
    <div class="inline basis-1/3 p-1 px-2 md:p-2 rounded md:rounded-xl ">
        <div class="inline-block rounded-full p-1 md:p-2 pb-3 md:pt-1 mr-2 md:mr-4 h-6 md:h-10 w-6 md:w-10 bg-stone-200 font-bold text-xs md:text-xl text-center">2</div>
        <div class="inline-block text-sm md:text-xl ">{{__('leads.help_2')}}</div>
    </div>
    <div class="inline basis-1/3 p-1 px-2 md:p-2 rounded md:rounded-xl ">
        <div class="inline-block rounded-full p-1 md:p-2 pb-3 md:pt-1 mr-2 md:mr-4  h-6 md:h-10 w-6 md:w-10 bg-stone-200 font-bold text-xs md:text-xl text-center">3</div>
        <div class="inline-block text-sm md:text-xl ">{{__('leads.help_3')}}</div>
    </div>
    
</div>

<div class="bg-white rounded-xl p-4 dark:bg-neutral-800 mt-6">
    <form action="{{ route('leads.store') }}" method="POST" >
        @csrf
        <div class="w-full mb-4 ">
            <label for="title" class="">{{__('leads.title')}}<span class="text-red-600"> (*)</span></label>
            <input id="title" type="text" 
            class="block mt-2 w-full border-gray-300 rounded-md
            dark:text-black" 
            name="title" value="{{old('title')}}" 
            required autofocus autocomplete="title" />
            @error('title')
                <div class="mt-2 p-2 rounded bg-red-400">{{ $message }}</div>
            @enderror
    </div>
    <div class="w-full mb-4 ">
            <label for="note" class="">{{__('leads.note')}}</label>
            <textarea id="note" 
            class="block mt-2 w-full border-gray-300 rounded-md dark:text-black" 
            name="note">{{ old('note') }}</textarea>
            @error('note')
                <div class="mt-2 p-2 rounded bg-red-400">{{ $message }}</div>
            @enderror
    </div>
    <div class="w-full mb-4 ">
            <label for="source_id" class="block mb-2 w-full">{{__('leads.source')}}<span class="text-red-600"> (*)</span></label>
            <select
            id="source_id" name="source_id" 
            class="w-full border-gray-300 rounded-md" 
            required 
            >
            <option value="">{{__('leads.source')}}</option> 

            @foreach($sources as $item)
                <option value="{{$item->id}}" {{ old('source_id') == $item->id ? 'selected' : ''}}>{{$item->source}}</option> 
            @endforeach   
            </select>
            @error('source_id')
                <div class="mt-2 p-2 rounded bg-red-400">{{ $message }}</div>
            @enderror
    </div>
    <div class="w-full mb-4 ">
            <label for="type_id" class="block mb-2 w-full">{{__('leads.state')}}<span class="text-red-600"> (*)</span></label>
            <select
            id="type_id" name="type_id" value="old('type_id')"
            class="w-full border-gray-300 rounded-md" 
            required 
            >   
            @foreach($types as $item)
                <option value="{{$item->id}}" {{ old('type_id') == $item->id ? 'selected' : ''}}>{{$item->type}}</option> 
            @endforeach
            </select>
            @error('type_id')
                <div class="mt-2 p-2 rounded bg-red-400">{{ $message }}</div>
            @enderror
    </div>
    <div class="md:flex md:flex-row mb-4">
        <div class="w-full md:w-[50%] md:mr-4 mb-4 ">
            <label for="executionDate" class="block mb-2 w-full">{{__('leads.date')}}<span class="text-red-600"> (*)</span></label>
            <input id="title" type="date" 
            class="block mt-2 w-full border-gray-300 rounded-md dark:text-black" 
            name="executionDate" value="{{old('executionDate')}}" 
            autocomplete="executionDate" /> 
            @error('executionDate')
                <div class="mt-2 p-2 rounded bg-red-400">{{ $message }}</div>
            @enderror               
        </div>
        <div class="relative w-full md:w-[50%] " 
        id="time"
        data-te-format24="true"
        >
            <label for="executionTime" class="block mb-2 w-full">{{__('leads.time')}}</label>
            <input type="text"
            class="peer block mt-1 w-full rounded-md bg-transparent 
            pt-2 bg-white border-gray-300
            outline-none transition-all duration-200 ease-linear 
            focus:placeholder:opacity-100 peer-focus:text-primary 
            data-[te-input-state-active]:placeholder:opacity-100 
            motion-reduce:transition-none 
            dark:text-black dark:placeholder:text-black dark:peer-focus:text-black [&:not([data-te-input-placeholder-active])]:placeholder:opacity-100"
            id="executionTime" 
            name="executionTime" 
            value="{{old('executionTime')}}" 
            data-te-toggle="timepicker"/>
            @error('executionTime')
                <div class="mt-2 p-2 rounded bg-red-400">{{ $message }}</div>
            @enderror  
        </div>
        <!--Submit button-->
        
    </div> 
    <x-button
        type="submit"
        class="block w-full rounded-md bg-gray-600 py-4 font-medium text-white">
        {{__('leads.save')}} -> {{__('leads.help_h_2')}}
        </x-button>
    </form>
</div>