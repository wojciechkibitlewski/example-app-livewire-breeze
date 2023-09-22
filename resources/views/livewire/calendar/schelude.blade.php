<div>
    <x-a-header>
        <div class="items-center">
            @include('livewire/calendar/includes/calendarMenu')
        </div>
        <x-a-title-header title="{{__('calendar.calendar_schelude')}}" />
    </x-a-header>

    <div class="relative min-h-screen">    

        <div class="p-4">
            <ul>
                @foreach ($days as $day)
                    @if ( date('d', strtotime($day)) == '01' )
                        <!-- <li wire:key="{{$day}}_month" id="{{$day}}_month" >
                        <figure class="p-2 rounded-xl bg-white text-center w-full">
                            <img src="{{asset('images/'.date('F', strtotime($day)).'.jpg')}}" alt="" class="block h-20">
                        </figure>
                        </li> -->
                    @endif

                    @if ( date('l', strtotime($day)) == 'Monday' )
                        <li wire:key="{{$day}}_week" id="{{$day}}_week" 
                        class="p-2 my-2 rounded-md text-xs bg-gray-900 text-gray-100 dark:bg-gray-400 dark:text-gray-900"
                        >{{$day}} - {{ date('Y-m-d', strtotime($day.' + 7 day' )) }} </li>
                    @endif

                    <li wire:key="{{$day}}" id="{{ date('Y-m-d', strtotime($day.' + 2 day' )) }}" 
                    class="flex flex-row justify-between p-2 border-b border-gray-300 {{ $day == Date('Y-m-d') ? 'bg-white dark:bg-slate-500 ' : ''}}"
                    >
                        <div class="w-20 p-2 mr-2 rounded-md text-xs text-center {{ date('l', strtotime($day)) == 'Sunday' ? 'bg-red-600 text-white ' : '' }}">
                            <div class="w-full">{{__('calendar.'.date('l', strtotime($day))) }}</div>
                            <div class="w-full text-4xl">{{ date('d', strtotime($day)) }}</div>
                            <div class="w-full">{{__('calendar.'.date('F', strtotime($day))) }}</div>
                        </div>
                        @php
                            $leads = getLeadByDate($day);
                            $todos = getTodoByDate($day)
                        @endphp
                        <div class="md:flex w-full">
                            @if($leads)
                                @foreach($leads as $l)
                                    <a 
                                    href="{{route('leads.show',$l->prefix)}}"
                                    
                                    wire:key="{{$l->prefix}}" id="{{$l->prefix}}" 
                                    class="w-full md:w-80 p-2 rounded-xl min-h-20 bg-gray-300 mb-2 md:mr-2
                                    dark:bg-gray-700 cursor-pointer" 
                                    >
                                        <div class="text-xs">{{__('calendar.time')}} {{ date("H:i", strtotime($l->executionTime)) }}</div>
                                        <div class="text-xl">{{$l->title}}</div>
                                        <div class="text-xs">{{ getClientName($l->client_id) }}</div>
                                    </a>
                                @endforeach
                            @endif
                            @if($todos)
                                @foreach($todos as $todo)
                                    <div wire:key="{{$todo->id}}" id="{{$todo->id}}"
                                    class="w-full md:w-80 p-2 rounded-xl h-20 bg-emerald-200 mb-2 md:mr-2 dark:bg-emerald-800">
                                        {{$todo->name}}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    

</div>
