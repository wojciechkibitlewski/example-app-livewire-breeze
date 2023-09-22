<div class="bg-white rounded-xl p-4 dark:bg-neutral-800 mt-6">
    <form action="{{ route('clients.update') }}" method="POST" >
        @csrf
        <input type="hidden" name="prefix" value="{{ $client->prefix }}" />
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

            
        <div class="w-full mb-4 ">
            <label for="name" class="">{{__('clients.name')}}<span class="text-red-600"> (*)</span></label>
            <x-input id="name" type="text" 
            name="name" value="{{$client->name}}" 
            required autofocus autocomplete="name" />
        </div> 
        <div class="w-full mb-4 ">
            <label for="email" class="">{{__('clients.mail')}}</label>
            <x-input id="email" type="email" 
            name="email" value="{{$client->email}}" 
            autocomplete="email" />
        </div> 
        <div class="w-full mb-4 ">
            <label for="phone" class="">{{__('clients.phone')}}</label>
            <x-input id="phone" type="text" 
            name="phone" value="{{$client->phone}}" 
            autocomplete="phone" />
        </div> 
        <div class="w-full mb-4 ">
            <label for="social" class="">{{__('clients.social')}}</label>
            <x-input id="social" type="text" 
            name="social" value="{{$client->social}}" 
            autocomplete="social" />
        </div> 
        <div class="w-full mb-4 ">
            <label for="firm" class="">{{__('clients.firm')}}</label>
            <x-input id="firm" type="text" 
            name="firm" value="{{$client->firm}}" 
            autocomplete="firm" />
        </div> 

        <div class="mb-4">
            <label for="note" class="">{{__('clients.note')}}</label>
            <textarea id="note" class="block mt-1 rounded-md w-full border-gray-300 dark:text-black" rows="13"
            name="note">{{$client->note}}</textarea>
        </div>
        
        <!--Submit button-->
        <x-button type="submit">
        {{__('clients.edit')}}
        </x-button>
    </form>
</div>