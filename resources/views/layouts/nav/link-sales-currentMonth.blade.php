<a class="flex h-6 cursor-pointer items-center truncate rounded-[5px] py-4 pl-[2rem] pr-6 text-gray-600 outline-none transition duration-300 ease-linear 
hover:bg-gray-100 hover:outline-none 
{{ request()->is('leads/currentMonth') ? 'bg-gray-100 dark:bg-gray-600':'' }} 
focus:bg-white/10 focus:outline-none 
active:bg-white/10 active:outline-none 
data-[te-sidenav-state-focus]:outline-none 
motion-reduce:transition-none
dark:text-white dark:hover:bg-gray-700
"
data-te-sidenav-link-ref
href="{{route('leads.currentMonth')}}"
title="{{__('sidenav.order_current_month')}}"
>
{{__('sidenav.order_current_month')}}
</a>