<div>
    <div class="grid grid-cols-5 w-full text-xs min-w-[1200px]">
        <div class="bg-slate-300 border-r border-white dark:bg-slate-900">
            <div class="flex items-center justify-center mb-[55px] uppercase font-black border-b border-white p-4 ">
                <p class="inline mr-2">{{__('todo.idea')}}</p>
                <button class="cursor-pointer" type="button" wire:click="showIdeaAll">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 inline">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm0 8.625a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25zM15.375 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zM7.5 10.875a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            
            <div class="p-2">
                @include('livewire.todo.includes.create-kaban-box')
            </div>
            <div id="idea" class="w-full min-h-[300px] p-2 text-base">
                @if($ideaList)
                @foreach ($ideaList as $item)
                    
                    @include('livewire.todo.includes.show-kaban-box')
                    
                @endforeach
                @endif
            </div>
        </div>
        <div class="col-span-3 grid grid-cols-3 gap-4 bg-stone-300 dark:bg-stone-800 place-content-start border-r border-white">
            <div class="col-span-3 text-center p-4 h-[53px] uppercase font-black border-b border-white">
                {{__('todo.in_progress')}}
            </div>

            <div class="bg-white p-2 ml-4 rounded-xl dark:bg-stone-700 ">
                
                <div class="flex items-center justify-center mb-4 uppercase font-black ">
                    <p class="inline mr-2">{{__('todo.this_week')}}</p>
                    <button class="cursor-pointer" type="button" wire:click="showThisWeekAll">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 inline">
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm0 8.625a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25zM15.375 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zM7.5 10.875a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                
                <div id="thisWeek" class="w-full min-h-[240px] p-2 text-base">
                    @if($thisWeekList)
                    @foreach ($thisWeekList as $item)
                        
                        @include('livewire.todo.includes.show-kaban-box')
                        
                    @endforeach
                    @endif

                    
                    
                </div>
            </div>
            <div class="bg-white p-2 rounded-xl dark:bg-stone-700 ">
                <div class="flex items-center justify-center mb-4 uppercase font-black ">
                    <p class="inline mr-2">{{__('todo.waiting')}}</p>
                    <button class="cursor-pointer" type="button" wire:click="showWaitingAll">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 inline">
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm0 8.625a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25zM15.375 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zM7.5 10.875a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                
                <div id="waiting" class="w-full min-h-[300px] p-2 text-base">
                    @if($waitingList)
                    @foreach ($waitingList as $item)
                        
                        @include('livewire.todo.includes.show-kaban-box')
                        
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="bg-white p-2 mr-4 rounded-xl dark:bg-stone-700 ">
                <div class="flex items-center justify-center mb-4 uppercase font-black ">
                    <p class="inline mr-2">{{__('todo.doing_today')}}</p>
                    <button class="cursor-pointer" type="button" wire:click="showWorkingAll">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 inline">
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm0 8.625a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25zM15.375 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zM7.5 10.875a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                
                
                <div id="working" class="w-full min-h-[300px] p-2 text-base">
                    @if($workingList)
                    @foreach ($workingList as $item)
                        
                        @include('livewire.todo.includes.show-kaban-box')
                        
                    @endforeach
                    @endif

                </div>
            </div>
        </div>
        <div class="bg-slate-300  dark:bg-slate-900">
            <div class="flex items-center justify-center mb-[55px] uppercase font-black border-b border-white p-4 ">
                <p class="inline mr-2">{{__('todo.carried_out')}}</p>
                <button class="cursor-pointer" type="button" wire:click="showDoneAll">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 inline">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm0 8.625a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25zM15.375 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zM7.5 10.875a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            
            <div id="done" class="w-full min-h-[300px] p-2 text-base">
                @if($doneList)
                @foreach ($doneList as $item)
                    @include('livewire.todo.includes.show-kaban-box')
                @endforeach
                @endif

            </div>
        </div>
    </div>

    <x-a-modal key:wire="showIdeaAllModal" name="showIdeaAllModal" title="{{__('todo.idea')}}">
        <x-slot:body>
        @include('livewire.todo.includes.showIdeaAllModal')
        </x-slot>
    </x-a-modal>
    <x-a-modal key:wire="showWaitingAllModal" name="showWaitingAllModal" title="{{__('todo.waiting')}}">
        <x-slot:body>
        @include('livewire.todo.includes.showWaitingAllModal')
        </x-slot>
    </x-a-modal>
    <x-a-modal key:wire="showThisWeekAllModal" name="showThisWeekAllModal" title="{{__('todo.this_week')}}">
        <x-slot:body>
        @include('livewire.todo.includes.showThisWeekAllModal')
        </x-slot>
    </x-a-modal>
    <x-a-modal key:wire="showWorkingAllModal" name="showWorkingAllModal" title="{{__('todo.doing_today')}}">
        <x-slot:body>
        @include('livewire.todo.includes.showWorkingAllModal')
        </x-slot>
    </x-a-modal>
    <x-a-modal key:wire="showDoneAllModal" name="showDoneAllModal" title="{{__('todo.carried_out')}}">
        <x-slot:body>
        @include('livewire.todo.includes.showDoneAllModal')
        </x-slot>
    </x-a-modal>

    <script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script>

    <script>
    var idea = document.querySelector("#idea");
    var thisWeek = document.querySelector("#thisWeek");
    var waiting = document.querySelector("#waiting");
    var working = document.querySelector("#working");
    var done = document.querySelector("#done");
    

    new Sortable(idea, {
        group: 'shared',
        animation: 150,
        onAdd: function (evt) {
            let orderIds = Array.from(idea.querySelectorAll('[drag-item]'))
                .map(itemEl => itemEl.getAttribute('drag-item'));
            let toKaban = 'idea';
            @this.reorder(orderIds, toKaban);
	    },
        onSort: function (evt) {
            let boxIds = Array.from(idea.querySelectorAll('[drag-item]'))
                .map(itemEl => itemEl.getAttribute('drag-item'));
            @this.reorderWithinDiv(boxIds);
        },

    });

    new Sortable(thisWeek, {
        group: 'shared',
        animation: 150,
        onAdd: function (evt) {
            let orderIds = Array.from(thisWeek.querySelectorAll('[drag-item]'))
                .map(itemEl => itemEl.getAttribute('drag-item'));
            let toKaban = 'thisWeek';
            
            // Wywołanie funkcji reorder() w Livewire, aby zaktualizować dane w bazie danych
            @this.reorder(orderIds, toKaban);
	    },
        onSort: function (evt) {
            let boxIds = Array.from(thisWeek.querySelectorAll('[drag-item]'))
                .map(itemEl => itemEl.getAttribute('drag-item'));
            @this.reorderWithinDiv(boxIds);
        },

    });
    new Sortable(waiting, {
        group: 'shared',
        animation: 150,
        onAdd: function (evt) {
            let orderIds = Array.from(waiting.querySelectorAll('[drag-item]'))
                .map(itemEl => itemEl.getAttribute('drag-item'));
            let toKaban = 'waiting';
            
            // Wywołanie funkcji reorder() w Livewire, aby zaktualizować dane w bazie danych
            @this.reorder(orderIds, toKaban);
	    },
        onSort: function (evt) {
            let boxIds = Array.from(waiting.querySelectorAll('[drag-item]'))
                .map(itemEl => itemEl.getAttribute('drag-item'));
            @this.reorderWithinDiv(boxIds);
        },


    });

    new Sortable(working, {
        group: 'shared',
        animation: 150,
        onAdd: function (evt) {
            let orderIds = Array.from(working.querySelectorAll('[drag-item]'))
                .map(itemEl => itemEl.getAttribute('drag-item'));
            let toKaban = 'working';
            
            // Wywołanie funkcji reorder() w Livewire, aby zaktualizować dane w bazie danych
            @this.reorder(orderIds, toKaban);
	    },
        onSort: function (evt) {
            let boxIds = Array.from(working.querySelectorAll('[drag-item]'))
                .map(itemEl => itemEl.getAttribute('drag-item'));
            @this.reorderWithinDiv(boxIds);
        },

    });
    
    new Sortable(done, {
        group: 'shared',
        animation: 150,
        onAdd: function (evt) {
            let orderIds = Array.from(done.querySelectorAll('[drag-item]'))
                .map(itemEl => itemEl.getAttribute('drag-item'));
            let toKaban = 'done';
            
            // Wywołanie funkcji reorder() w Livewire, aby zaktualizować dane w bazie danych
            @this.reorder(orderIds, toKaban);
	    },
        onSort: function (evt) {
            let boxIds = Array.from(done.querySelectorAll('[drag-item]'))
                .map(itemEl => itemEl.getAttribute('drag-item'));
            @this.reorderWithinDiv(boxIds);
        },
    });  
    

    </script>
</div>

