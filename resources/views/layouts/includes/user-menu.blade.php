<div class="relative z-[12] ml-4" data-te-dropdown-ref>
    <a class="px-2"
        href="#"
        id="dropdownMenuButton2"
        role="button"
        data-te-dropdown-toggle-ref
        aria-expanded="false"
        data-te-ripple-init
        data-te-ripple-color="light">
            <img class="inline-block h-7 w-7 rounded-full ring-1 ring-white" 
            src="{{ Avatar::create('Agnieszka Mandal')->toBase64() }}" 
            alt="{{ Auth::user()->name }}"
            loading="lazy"/>
            
        <span class="hidden md:inline-block ml-2 ">{{__('sidenav.welcome')}} {{ Auth::user()->name }} </span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
        class="w-4 h-4 inline ml-2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
        </svg>

    </a> 
    <ul
        class="relative z-[20] !top-6 w-[10rem] min-w-[250px] !right-0 m-0 mt-2 hidden list-none overflow-hidden p-2 
        rounded-md border-none bg-white bg-clip-padding text-left text-base shadow-md 
        dark:bg-grayBlack [&[data-te-dropdown-show]]:block"
        aria-labelledby="dropdownMenuButton2"
        data-te-dropdown-menu-ref>
        <!-- Second dropdown menu items -->
        <li>
            <div class="flex flex-row p-4">
                <div class=" mr-2">
                    <img class="inline-block h-7 w-7 rounded-full ring-1 ring-white" 
                    src="{{ Avatar::create('Agnieszka Mandal')->toBase64() }}" 
                    alt="{{ Auth::user()->name }}"
                    loading="lazy"/>
                    
                    <!-- <img class="inline-block h-7 w-7 rounded-full ring-1 ring-white" 
                    src="{{ Auth::user()->profile_photo_url }}" 
                    alt="{{ Auth::user()->name }}"
                    loading="lazy"/> -->
                </div>
                <div class="overflow-hidden">
                    <p>{{ Auth::user()->name }}</p>
                    <p class="text-xs text-gray-400">{{ Auth::user()->email }}</p>
                </div>
            </div>
        </li>
        <li><hr class="my-2" /></li>

        <li>
            <a
            class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
            href="{{route('profile.show')}}"
            data-te-dropdown-item-ref
            >
                <svg xmlns="http://www.w3.org/2000/svg" 
                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6  inline mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                {{__('sidenav.profile')}}  
            </a>
        </li>
        <li>
            <a
            class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
            href="#"
            data-te-dropdown-item-ref
            >
                <svg xmlns="http://www.w3.org/2000/svg" 
                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                </svg>
                {{__('sidenav.message')}}
            </a>
        </li>
        <li><hr class="my-2" /></li>
        <li>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
            <a
            class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-black 
            hover:bg-neutral-100 active:text-neutral-800 active:no-underline 
            
            dark:text-gray-200 dark:hover:bg-white/30"
            href="{{route('logout')}}"
            data-te-dropdown-item-ref
            onclick="event.preventDefault();
            this.closest('form').submit();"
            >
                <svg xmlns="http://www.w3.org/2000/svg" 
                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                </svg>
                {{ __('sidenav.logout') }}
            </a>
            </form>
        </li>
    </ul>
</div>