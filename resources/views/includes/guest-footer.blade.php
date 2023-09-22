<div class="text-sm mt-8">
            <a href="" title="">{{__('auth.contact_us')}}</a> | 
            <a href="" title="">{{__('auth.terms')}}</a> | 
            <a href="" title="">{{__('auth.privacy')}}</a> |
            <div class="inline" data-te-dropdown-position="dropup">
                <button
                    class="inline rounded pt-2.5 text-black dark:text-gray-200"
                    type="button"
                    id="dropdownMenuButton1u"
                    data-te-dropdown-toggle-ref
                    aria-expanded="false"
                    data-te-ripple-init
                    data-te-ripple-color="light">
                    {{__('auth.language')}}
                    <span class="ml-1 w-2">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        class="h-5 w-5 inline">
                        <path
                        fill-rule="evenodd"
                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                        clip-rule="evenodd" />
                    </svg>
                    </span>
                </button>
                <ul
                    class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg 
                    dark:bg-grayDark [&[data-te-dropdown-show]]:block"
                    aria-labelledby="dropdownMenuButton1u"
                    data-te-dropdown-menu-ref>
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li class="inline">
                            <a rel="alternate" 
                            class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                            data-te-dropdown-item-ref>
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                    
                    
                </ul>
                </div>
        </div>