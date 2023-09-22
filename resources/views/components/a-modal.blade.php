@props(['name','title'])
<div
    x-data = "{show: false, name: '{{$name}}' }"
    x-show = "show"
    x-on:open-modal.window = "show = ($event.detail.name === name)"
    x-on:close-modal.window = "show = false"
    x-on:keydown.escape.window = "show = false"
    tabindex="-1"
    x-transition:enter="transform ease-in-out duration-300 transition" 
    x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2" 
    x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0" 

    id="modal" role="dialog" aria-labelledby="modalLabel" aria-hidden="true"
    class="fixed z-[40] bottom-0 top-0 right-0 ease-in-out" style="display:none">
    <div x-on:click="show = false" class="fixed top-0 right-0 bg-gray-900 opacity-40 w-screen h-screen"></div>
    <div class="dark:bg-stone-950 bg-white m-auto fixed top-0 right-0 w-[350px] h-screen p-6" >
        
        <div class="flex flex row justify-between">
            <div>
                <h5 class="font-medium text-lg"
                id="addSourceRightLabel">
                {{ $title ?? ''}}
                </h5>
            </div>
            <div>
                <button type="button"
                x-on:click = "$dispatch('close-modal')"
                class="box-content rounded-none border-none opacity-50 
                hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none">
                    <span class="w-[1em] focus:opacity-100 disabled:pointer-events-none disabled:select-none disabled:opacity-25 [&.disabled]:pointer-events-none [&.disabled]:select-none [&.disabled]:opacity-25">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </span>
                </button>
            </div>

        </div>
        <div class="mt-6">
        {{ $body }}
        </div>
    </div>

</div>