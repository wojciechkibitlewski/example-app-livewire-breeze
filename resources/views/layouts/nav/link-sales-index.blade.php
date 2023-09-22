<a class="flex h-6 cursor-pointer items-center truncate rounded-[5px] py-4 pl-[2rem] pr-6 text-gray-600 outline-none transition duration-300 ease-linear 
hover:bg-gray-100 hover:outline-none 
focus:bg-gray-100 focus:outline-none
{{ request()->is('leads') ? 'bg-gray-100 dark:bg-gray-600':'' }} 
active:bg-gray-100 active:outline-none 
data-[te-sidenav-state-focus]:outline-none 
motion-reduce:transition-none
dark:text-white dark:hover:bg-gray-700
"
href="{{route('leads.index')}}"
title="{{__('sidenav.order_all')}}"
data-te-sidenav-link-ref>
{{__('sidenav.order_all')}}
</a>