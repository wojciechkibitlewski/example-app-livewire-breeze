<div class=" my-4 text-xs">
    @if($startDate)
        <div class="inline-block p-2 rounded-xl bg-neutral-300 mr-2 dark:bg-neutral-600">
            <div class="inline">From: <b>{{$startDate}}</b></div>
            <button class="inline" wire:click = "clearStartDate">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" 
                class="w-4 h-4 inline">
                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    @endif
    @if($endDate)
        <div class="inline-block p-2 rounded-xl bg-neutral-300 mr-2 dark:bg-neutral-600">
            <div class="inline">To: <b>{{$endDate}}</b></div>
            <button class="inline" wire:click = "clearEndDate">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" 
                class="w-4 h-4 inline">
                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    @endif
    @if($type_id)
        <div class="inline-block p-2 rounded-xl bg-neutral-300 mr-2 dark:bg-neutral-600">
            <div class="inline"><b>{{ getStateName($type_id) }}</b></div>
            <button class="inline" wire:click = "clearType">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" 
                class="w-4 h-4 inline">
                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    @endif
    @if($source_id)
        <div class="inline-block p-2 rounded-xl bg-neutral-300 mr-2 dark:bg-neutral-600">
            <div class="inline"><b>{{ getSourceName($source_id) }}</b></div>
            <button class="inline" wire:click = "clearSource">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" 
                class="w-4 h-4 inline">
                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    @endif
    @if($value)
        <div class="inline-block p-2 rounded-xl bg-neutral-300 mr-2 dark:bg-neutral-600">
            <div class="inline"><b>{{ $value == 1 ? 'nieopłacone' : 'opłacone' }}</b></div>
            <button class="inline" wire:click = "clearValue">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" 
                class="w-4 h-4 inline">
                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    @endif
    <!-- @php 
    print_r($test);
    @endphp -->
</div>
